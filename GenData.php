<?php
// Functions to generate randomised logins, passwords and dates.
// The logins and passwords are randomly generated from the standard char string
// The dates are generated between any two dates
// Note: No error catching implementation

// Create Login Names/Passwords
// Function: Generates a randomised string to be used as login
// Parameters: Integer length of string, users choice of login ('l')
//             or password ('p') (defaulted to login)
// Returns: Login/Password string
function randLorP(int $len, $what = 'l'){
  if ($what == 'l'){ // Login character pool
  $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
} elseif ($what == 'p') { // Password character pool
    $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ!%^&*()';
  }
  $ans = '';
  for ($i = 0; $i < $len; $i++) {
    $ans .= $chars[rand(0, strlen($chars)-1)];
  }
  return $ans;
}

// Create Random Date //
// Function: Generates a random date between two interval dates
// Parameters: Starting and finishing dates as strings
// Returns: Date random between parameters as string
function randDate($min_date, $max_date) {
  $min = strtotime($min_date);
  $max = strtotime($max_date);
  $r = rand($min, $max);
  return date('Y-m-d H:i:s', $r);
}

// Create Emails
// Function: Generates a correctly formated email
// Parameters: Integer length of string for name of email, length of string
// Returns: full email string
function randEmail(int $len){
  $chars = '0123456789abcdefghijklmnopqrstuvwxyz_';
  $at = '@';
  $site = array('gmail','hotmail','yahoo');
  $country = array('.com','.co.uk','.co.au');

  $ans = '';
  for ($i = 0; $i < $len; $i++) {
    $ans .= $chars[rand(0, strlen($chars)-1)];
  }
  $ans .= $at.$site[array_rand($site, 1)].$country[array_rand($country, 1)];
  return $ans;
}

// Create UK mobile phone numbers
// Function: Generates a correctly formated phone number
// Parameters: None
// Returns: full email string
function randPhone(){
  $chars = '0123456789';
  $ans = '07';
  for ($i = 0; $i < 9; $i++) {
    $ans .= $chars[rand(0, strlen($chars)-1)];
  }
  return $ans;
}
