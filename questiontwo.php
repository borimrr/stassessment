<?php

/*
 * There is an extra "Marco Burns" in here
 * with a lower account_id than the first
 * one to verify sort algorithm.
 */
$sampleData = [
    [
        'guest_id' => 177,
        'guest_type' => 'crew',
        'first_name' => 'Marco',
        'middle_name' => NULL,
        'last_name' => 'Burns',
        'gender' => 'M',
        'guest_booking' => [
            [
                'booking_number' => 20008683,
                'ship_code' => 'OST',
                'room_no' => 'A0073',
                'start_time' => 1438214400,
                'end_time' => 1483142400,
                'is_checked_in' => true,
            ],
        ],
        'guest_account' => [
            [
                'account_id' => 20009503,
                'status_id' => 2,
                'account_limit' => 0,
                'allow_charges' => true,
            ],
        ],
    ],
    [
        'guest_id' => 10000113,
        'guest_type' => 'crew',
        'first_name' => 'Bob Jr ',
        'middle_name' => 'Charles',
        'last_name' => 'Hemingway',
        'gender' => 'M',
        'guest_booking' => [
            [
                'booking_number' => 10000013,
                'room_no' => 'B0092',
                'is_checked_in' => true,
            ],
        ],
        'guest_account' => [
            [
                'account_id' => 10000522,
                'account_limit' => 300,
                'allow_charges' => true,
            ],
        ],
    ],
    [
        'guest_id' => 10000114,
        'guest_type' => 'crew',
        'first_name' => 'Al ',
        'middle_name' => 'Bert',
        'last_name' => 'Santiago',
        'gender' => 'M',
        'guest_booking' => [
            [
                'booking_number' => 10000014,
                'room_no' => 'A0018',
                'is_checked_in' => true,
            ],
        ],
        'guest_account' => [
            [
                'account_id' => 10000013,
                'account_limit' => 300,
                'allow_charges' => false,
            ],
        ],
    ],
    [
        'guest_id' => 10000115,
        'guest_type' => 'crew',
        'first_name' => 'Red ',
        'middle_name' => 'Ruby',
        'last_name' => 'Flowers ',
        'gender' => 'F',
        'guest_booking' => [
            [
                'booking_number' => 10000015,
                'room_no' => 'A0051',
                'is_checked_in' => true,
            ],
        ],
        'guest_account' => [
            [
                'account_id' => 10000519,
                'account_limit' => 300,
                'allow_charges' => true,
            ],
        ],
    ],
    [
        'guest_id' => 177,
        'guest_type' => 'crew',
        'first_name' => 'Marco',
        'middle_name' => NULL,
        'last_name' => 'Burns',
        'gender' => 'M',
        'guest_booking' => [
            [
                'booking_number' => 20008683,
                'ship_code' => 'OST',
                'room_no' => 'A0073',
                'start_time' => 1438214400,
                'end_time' => 1483142400,
                'is_checked_in' => true,
            ],
        ],
        'guest_account' => [
            [
                'account_id' => 20009502,
                'status_id' => 2,
                'account_limit' => 0,
                'allow_charges' => true,
            ],
        ],
    ],
    [
        'guest_id' => 10000116,
        'guest_type' => 'crew',
        'first_name' => 'Ismael ',
        'middle_name' => 'Jean-Vital',
        'last_name' => 'Jammes',
        'gender' => 'M',
        'guest_booking' => [
            [
                'booking_number' => 10000016,
                'room_no' => 'A0023',
                'is_checked_in' => true,
            ],
        ],
        'guest_account' => [
            [
                'account_id' => 10000015,
                'account_limit' => 300,
                'allow_charges' => true,
            ],
        ],
    ],
];

/**
 * Sorts the given array by the values of the provided
 * keys. Sort is done in order of the provided keys, so
 * 'last_name', 'account_id' will sort first by 'last_name'
 * first and, if they have the same last_name, will then
 * sort by the account_id.
 * @param array $data
 * @param string ...$sortKeys
 */
function sort_by_keys(array &$data, string ...$sortKeys)
{
    usort($data, function ($a, $b) use ($sortKeys) {
        // Keep track of ordered values to be checked
        $aValues = [];
        $bValues = [];

        array_walk_recursive(
            $a,
            function ($val, $key) use (&$aValues, $sortKeys) {
                if (in_array($key, $sortKeys)) {
                    /*
                     * Use array_search for index so "a"
                     * value ends up in right order.
                     */
                    $aValues[array_search($key, $sortKeys)] = $val;
                }
            }
        );

        array_walk_recursive(
            $b,
            function ($val, $key) use (&$bValues, $sortKeys) {
                if (in_array($key, $sortKeys)) {
                    /*
                     * Use array_search for index so "b"
                     * value ends up in right order.
                     */
                    $bValues[array_search($key, $sortKeys)] = $val;
                }
            }
        );

        // Compare ordered collection of values for each item
        return $aValues <=> $bValues;
    });
}

// Sort by last_name first and then by account_id
sort_by_keys($sampleData, 'last_name', 'account_id');

foreach ($sampleData as $data) {
    echo $data['last_name'] . ' ' . $data['guest_account'][0]['account_id']
        . "\n";
}

