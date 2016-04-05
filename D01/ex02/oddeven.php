#!/usr/bin/php
<?php
while (1)
{
    echo("Entrez un nombre : ");
    if ($av = fgets(STDIN))
    {
        $trimme = trim($av);
        if (is_numeric($trimme))
        {
            if ($trimme % 2 == 0)
                echo("Le chiffre $trimme est Pair\n");
            else
                echo("Le chiffre $trimme est Impair\n");
        }
        else
          echo("'$trimme' n'est pas un chiffre\n");
    }
    else
    {
        echo ("\n");
        return ;
    }
}
?>
