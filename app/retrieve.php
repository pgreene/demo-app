<?php
require 'vendor/autoload.php';

use Aws\Ssm\SsmClient;
use Aws\Exception\AwsException;

// Create an SSM client
$ssmClient = new SsmClient([
    'region' => 'ca-central-1', 
    'version' => 'latest',
]);

// Specify the name of the parameter
$parameterName = 'dev-demo-app-db'; // Replace with your parameter name

try {
    // Retrieve the parameter
    $result = $ssmClient->getParameter([
        'Name' => $parameterName,
        'WithDecryption' => true,  // Decrypt the parameter value
    ]);

    // Get the decrypted value
    $decryptedValue = $result['Parameter']['Value'];

    echo "Decrypted value: " . $decryptedValue . "\n";

} catch (AwsException $e) {
    // Output error message if fails
    echo "Error retrieving parameter: " . $e->getMessage() . "\n";
}
?>
