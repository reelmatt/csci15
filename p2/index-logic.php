<?php
require 'includes/Form.php';
require 'includes/ExpandedForm.php';

use Thomas\ExpandedForm;

$form = new ExpandedForm($_GET);

#Array to store potential tip values to populate dropdown
$tipValues = [
    10 => '10%',
    15 => '15%',
    18 => '18%',
    20 => '20%',
    25 => '25%',
];

#Retrieve data from form
$numSplit = $form->get('numSplit');
$total = $form->get('billTotal');
$tip = $form->get('tip');
$round = $form->has('round');

#Process form for potential errors
if ($form->isSubmitted()) {
    $errors = $form->validate(
        [
            'numSplit' => 'required|numeric|min:0',
            'billTotal' => 'required|min:0|decimal',
        ]
    );

    #If no errors, calculate the amount owed and store in $share
    if (!$form->hasErrors) {
        $tipPercent = ($tip / 100) + 1;
        $totalTip = round(($tipPercent * $total), 2);
        $share = round(($totalTip / $numSplit), 2);

        #If user chose to round, calculate updated values
        if ($round == 1) {
            $remainder = (ceil($share) * $numSplit) - $totalTip;
            $share = ceil($share);
        }
    }
}
