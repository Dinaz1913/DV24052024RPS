<?php

require_once 'elements.php';

$jsonData = file_get_contents('elements.json');
$elementsData = json_decode($jsonData);

$GamingCharacters = [];

foreach ($elementsData as $name => $data) {
    $element = new Elements();

    $element->setElement
    ($data->Win1,
        $data->Win2,
        $data->Lose1,
        $data->Lose2,
        $data->Draw);

    $GamingCharacters[$name] = $element;
}

// User input
$ChosenElement = readline("Enter your choice (Scissors, Paper, Rock, Lizard, Spock): ");
$ChosenElement = ucwords(strtolower($ChosenElement));
echo "\n\n";

$ElementsToChoose = array_keys($GamingCharacters);
if (!in_array($ChosenElement, $ElementsToChoose)) {
    echo "Invalid choice! Please choose from Scissors, Paper, Rock, Lizard, or Spock.";
    exit;
}

$OpponentKeyElement = array_rand($ElementsToChoose);
$OpponentsCharacter = $ElementsToChoose[$OpponentKeyElement];

$NameMatch = findArrayName($OpponentsCharacter, $GamingCharacters);
$ResultOfOpponentFinal = Result($ChosenElement, $NameMatch);

switch ($ResultOfOpponentFinal) {
    case 'Win1':
    case 'Win2':
        echo "You lost this game. Opponent chose: $OpponentsCharacter\n";
        break;

    case 'Lose1':
    case 'Lose2':
        echo "You won this game. Opponent chose: $OpponentsCharacter\n";
        break;

    case 'Draw':
        echo "This game is a draw!";
        break;

    default:
        echo "Unexpected result: $ResultOfOpponentFinal\n";
}

