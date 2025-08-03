<?php
// This line generates a hashed version of the password '123456' using PHP’s built-in password_hash function
// explained in the SymfonyCasts Ep.3 transcript you provided
// It's also used in login-related examples in my labsheets to safely compare passwords later using password_verify
echo password_hash('123456', PASSWORD_DEFAULT);

// Reference:
// - password_hash and password_verify discussed in SymfonyCasts Episode 3 (Transcript section: "Connecting to MySQL in PHP")
// - Also referenced in "Login with Sessions labsheet 2023"
