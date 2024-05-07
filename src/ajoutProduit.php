<fieldset>
    <legend>Ajout d'un produit</legend>
    <form method="POST" action="index.php?page=recupProduit">
        <br>
        <p>
            <label>Désignation</label>
            <input type="text" name="designation" minlength="1" maxlength="30" required/>
        </p>
        <p>
            <textarea name="description" rows="10" cols="60" placeholder="Description de votre produit ..." required></textarea>
        </p>
        <p>
            <label>Prix HT</label>
            <input type="number" step="0.01" name="prix" minlength="1" required/>
        </p>
        <p>
            <input type="submit" value="Ajouter" name="btAjouter"/>
        </p>
    </form>
</fieldset>