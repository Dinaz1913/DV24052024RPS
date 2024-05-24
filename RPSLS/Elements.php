<?php

class Elements {
    private string $Win1;
    private string $Win2;
    private string $Lose1;
    private string $Lose2;
    private string $Draw;

    // Method to set the properties
    public function setElement

    (string $Win1,
     string $Win2,
     string $Lose1,
     string $Lose2,
     string $Draw)

    {
        $this->Win1 = $Win1;
        $this->Win2 = $Win2;
        $this->Lose1 = $Lose1;
        $this->Lose2 = $Lose2;
        $this->Draw = $Draw;
    }


    public function returnElement(): array {
        return [
            'Win1' => $this->Win1,
            'Win2' => $this->Win2,
            'Lose1' => $this->Lose1,
            'Lose2' => $this->Lose2,
            'Draw' => $this->Draw,
        ];
    }
}


function findArrayName($Name, $GamingCharacters) {
    foreach ($GamingCharacters
             as $characterName => $characterArray)
    {
        if ($Name === $characterName)
        {
            return $characterArray->returnElement();
        }
    }
    return null;
}

function Result
($ChosenElement,
 $NameMatch)
{
    if ($NameMatch !== null) {
        foreach ($NameMatch as $key => $value) {
            if ($value === $ChosenElement) {
                return $key;
            }
        }

    }
    return null;
}

