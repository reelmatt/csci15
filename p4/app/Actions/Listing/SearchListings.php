<?php

namespace App\Actions\Listing;

use App\Listing;

class SearchListings
{
    /** Create object to assist with filtering listings according to search **/
    public function __construct($listings, $queries)
    {
        $this->listings = $listings;
        $this->queries = $this->filterQuery($queries);
        $this->listings = $this->search();
    }

    /**
     * @param $queries -- A list of all potential query inputs
     * @return array -- removes any null elements and splits
     *   the array of features into individual queries
     */
    public function filterQuery($queries)
    {
        $returnQuery = [];

        foreach ($queries as $element => $parameters) {
            if (is_array($parameters)) {
                foreach ($parameters as $parameter) {
                    $returnQuery[$parameter] = true;
                }
            } else if ($parameters != null || $parameters != false) {
                $returnQuery[$element] = $parameters;
            }
        }

        return $returnQuery;
    }

    /**
     * Format the queries in a user-readable string
     */
    public function formatQueries($features)
    {
        $queryString = '';

        if (count($this->queries) > 0) {
            $i = 0;
            foreach ($this->queries as $element => $parameter) {
                //special case for 'price' -- add '$'
                if (strcmp($element, 'price') == 0) {
                    $queryString .= '$' . $parameter;
                } //special case for a feature -- only include $element
                else if (in_array($element, $features)) {
                    $queryString .= ($element == 'cats' || $element == 'dogs') ? str_plural($element) : $element;
                } //all other cases
                else {
                    $queryString .= $parameter . ' ' . (($parameter == 1) ? str_singular($element) : $element);
                }

                //add appropriate amount of commas
                if ($i < count($this->queries) - 1) {
                    $queryString .= ', ';
                }
                $i++;
            }
        }

        return $queryString;
    }

    public function search()
    {
        /**If there are queries to search by, filter accordingly
         * otherwise, return all listings without filtering
         */
        if (count($this->queries) > 0) {
            foreach ($this->queries as $element => $parameter) {
                //Set current element/parameter for access in filter()
                $this->currentElement = $element;
                $this->currentParameter = $parameter;

                /**
                 * Laravel filter() method only keeps items that pass truth test
                 * Info @ https://laravel.com/docs/5.6/collections#method-filter
                 */
                $listings = $this->listings->filter(function ($value) {
                    $parameter = $this->currentParameter;
                    $element = $this->currentElement;

                    //for a 'price' query, search using <=
                    if ($element == 'price' && $value->$element <= $parameter) {
                        return $value;
                    } //otherwise, use >=
                    else if ($element != 'price' && $value->$element >= $parameter) {
                        return $value;
                    } //if the query is a 'feature', check listing to see if it is in_array
                    else {
                        $features = $value->features()->pluck('features.name')->all();

                        $pass = ($features != null) ? $features : [];

                        if (in_array($element, $pass)) {
                            return $value;
                        }
                    }

                    return 0;
                });
                $this->listings = $listings;
            }
        }

        return $this->listings;
    }
}