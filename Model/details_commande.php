<?php

require_once("../ctrl/init.ctrl.php");

class membre{
    private string $id_details_commande;
    private string $designation;
    private float $quantite;
    private float $prix;
    private int $photo; 
    private int $id_commande;
    private int $id_produit;



    /**
     * Get the value of id_details_commande
     */ 
    public function getId_details_commande()
    {
        return $this->id_details_commande;
    }

    /**
     * Set the value of id_details_commande
     *
     * @return  self
     */ 
    public function setId_details_commande($id_details_commande)
    {
        $this->id_details_commande = $id_details_commande;

        return $this;
    }

    /**
     * Get the value of designation
     */ 
    public function getDesignation()
    {
        return $this->designation;
    }

    /**
     * Set the value of designation
     *
     * @return  self
     */ 
    public function setDesignation($designation)
    {
        $this->designation = $designation;

        return $this;
    }

    /**
     * Get the value of quantite
     */ 
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set the value of quantite
     *
     * @return  self
     */ 
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get the value of prix
     */ 
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set the value of prix
     *
     * @return  self
     */ 
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get the value of photo
     */ 
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * Set the value of photo
     *
     * @return  self
     */ 
    public function setPhoto($photo)
    {
        $this->photo = $photo;

        return $this;
    }

    /**
     * Get the value of id_commande
     */ 
    public function getId_commande()
    {
        return $this->id_commande;
    }

    /**
     * Set the value of id_commande
     *
     * @return  self
     */ 
    public function setId_commande($id_commande)
    {
        $this->id_commande = $id_commande;

        return $this;
    }

    /**
     * Get the value of id_produit
     */ 
    public function getId_produit()
    {
        return $this->id_produit;
    }

    /**
     * Set the value of id_produit
     *
     * @return  self
     */ 
    public function setId_produit($id_produit)
    {
        $this->id_produit = $id_produit;

        return $this;
    }
}