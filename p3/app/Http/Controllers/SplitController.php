<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SplitController extends Controller
{
    public function index(Request $request)
    {
        #Array to store potential tip values to populate dropdown
        $tipValues = [
            '0' => 'Choose one...',
            '10' => '10%',
            '15' => '15%',
            '18' => '18%',
            '20' => '20%',
            '25' => '25%',
        ];

        #Retrieve necessary information to process view
        $tip = $request->session()->get('tip');
        $totalTip = $request->session()->get('totalTip');
        $numSplit = $request->session()->get('numSplit');
        $share = $request->session()->get('share');
        $billTotal = $request->session()->get('billTotal');
        $remainder = $request->session()->get('remainder');
        $round = $request->session()->get('round');
        $submitted = $request->session()->get('submitted');

        return view('bill.index')->with([
            'tipValues' => $tipValues,
            'submitted' => $submitted,
            'tip' => $tip,
            'totalTip' => $totalTip,
            'numSplit' => $numSplit,
            'share' => $share,
            'round' => $round,
            'remainder' => $remainder,
            'billTotal' => $billTotal,
        ]);
    }

    /**form has been submitted
     * - validate, process, and return view with values
     */
    public function checkAnswer(Request $request)
    {
        #Validate form
        $this->validate($request, [
            'numSplit' => 'required|integer|min:0',
            'billTotal' => 'required|min:0|numeric',
        ]);

        #Retrieve data from form
        $numSplit = $request->input('numSplit');
        $billTotal = $request->input('billTotal');
        $tip = $request->input('tip');
        $round = $request->has('round');

        #If no errors, calculate the amount owed and store in $share
        $tipPercent = ($tip / 100) + 1;
        $totalTip = round(($tipPercent * $billTotal), 2);
        $share = round(($totalTip / $numSplit), 2);

        #If user chose to round, calculate updated values
        if ($round == 1) {
            $remainder = round((ceil($share) * $numSplit) - $totalTip, 2);
            $share = ceil($share);
        } else {
            $remainder = 0;
        }

        #Redirect with appropriate data
        return redirect('/')->with([
            'tip' => $tip,
            'totalTip' => $totalTip,
            'numSplit' => $numSplit,
            'share' => $share,
            'round' => $round,
            'remainder' => $remainder,
            'billTotal' => $billTotal,
            'submitted' => true,
        ]);
    }
}
