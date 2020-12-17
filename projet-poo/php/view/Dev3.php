<?php

class Dev3
{
    function afficherFormulaireContact()
    {
        echo 
        <<<x
        <section>
            <h3>formulaire de contact</h3>
            <form>
                <input type="text" placeholder="nom">
                <input type="text" placeholder="email">
                <input type="text" placeholder="sujet">
                <textarea placeholder="message"></textarea>
                <button>envoyer le message</button>
            </form>
        </section>
        x;

        $this->traiterFormulaire();
    }

    function traiterFormulaire ()
    {
        // A CODER...
    }
}