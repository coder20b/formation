# formation

Formation Dev Fullstack (Front + Back)

Stack = Pile
=> Pile des technologies mises en oeuvre sur un projet
=> HTML, CSS, JS, PHP, SQL  => FullStack
=> HTML + CSS + JS          => Front
=> PHP + SQL                => Back

## github

    Repository Github:

https://github.com/coder20b/formation

## liveshare

    mardi 12/01

https://prod.liveshare.vsengsaas.visualstudio.com/join?21DBB130E70BD11576A3E7575B4B71C31C89

## Questions ??

## ACTIVITES DU JOUR


MARDI MATIN     SYMFONY
MARDI APREM     REVISION EXAM
MERCREDI        EXAM
JEUDI           LH
VENDREDI        LH

MARDI PROCHAIN  NICOLAS

## SYMFONY ET SESSION

    LES SESSIONS SERVENT A MEMORISER DES INFOS SUR UN VISITEUR COTE SERVEUR
    (NOTE: SE POSER LA QUESTION SI ON POURRAIT UTILISER DES SESSIONS COTE FRONT AVEC sessionStorage...)
    https://symfony.com/doc/current/session.html

    * EN TRAIN DE DEVENIR PLUS POPULAIRE POUR REMPLACER LES SESSIONS COTE SERVEUR
        => JSON Web Tokens  (INFOS COTE SERVEUR MAIS AVEC GARANTIE DE NON MODIFICATION...)
            https://jwt.io/

```php


<?php
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// NE PAS OUBLIER DE RAJOUTER LES use POUR LES CLASSES
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Contact;
use App\Form\ContactType;

// POUR AFFICHER LA LISTE DES ANNONCES
use App\Repository\AnnonceRepository;

// POUR UTILISER UNE SESSION
use Symfony\Component\HttpFoundation\Session\SessionInterface;

// POUR UTILISER TWIG ON CREE UN HERITAGE DE CLASSE 
// AVEC LA CLASSE PARENTE AbstractController
class VitrineController extends AbstractController
{
    // ON RAJOUTE UNE PROPRIETE POUR UTILISER LES SESSIONS
    private $session;

    public function __construct(SessionInterface $session)
    {
        // ON MEMORISE LA SESSION DANS LA PROPRIETE
        $this->session = $session;
    }

    /**
     * @Route("/", name="accueil")
     */    
    function accueil ()
    {
        // ON A BESOIN D'UTILISER UNE SESSION ICI... 
        // https://symfony.com/doc/current/session.html
        $this->session->set('info1', 'coucou');     // ON MEMORISE UNE INFO ICI

        // DEV2 AJOUTE SON CODE...
        return $this->render("vitrine/index.html.twig");
    }

    /**
     * @Route("/ma-galerie", name="galerie")
     */    
    function galerie ()
    {
        // ICI ON PEUT RETROUVER LES INFOS DE SESSION
        $info1 = $this->session->get('info1');

        return $this->render("vitrine/galerie.html.twig", [
            // JE TRANSMETS LA VARIABLE A TWIG POUR AFFICHAGE
           "info1"  => $info1, 
        ]);
    }

    // ...
}

```

    PAUSE ET REPRISE A 11H05

## AJOUTER DES INFOS SUR User

    pseudo      string          OBLIGATOIRE
    nom         string          OPTIONNEL
    prenom      string          OPTIONNEL
    mobile      string          OPTIONNEL
    codePostal  string          OPTIONNEL

## PERSONNALISATION DE FORMULAIRES

    POUR PERSONNALISER LE CODE HTML DES FORMULAIRES...

    https://symfony.com/doc/current/form/form_customization.html#reference-forms-twig-form


## CONTRAINTE D'UNICITE SUR LE pseudo

    ON PEUT AJOUTER DES CONTRAINTES POUR AVOIR UN CHAMP pseudo UNIQUE DANS LA TABLE user

    https://symfony.com/doc/current/reference/constraints/UniqueEntity.html


```php

<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @UniqueEntity(fields={"email"}, message="email non disponible")
 * @UniqueEntity(fields={"pseudo"}, message="pseudo non disponible")
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isVerified = false;

    /**
     * @ORM\OneToMany(targetEntity=Annonce::class, mappedBy="user")
     */
    private $annonces;

    /**
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $pseudo;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mobile;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $codePostal;

    public function __construct()
    {
        $this->annonces = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection|Annonce[]
     */
    public function getAnnonces(): Collection
    {
        return $this->annonces;
    }

    public function addAnnonce(Annonce $annonce): self
    {
        if (!$this->annonces->contains($annonce)) {
            $this->annonces[] = $annonce;
            $annonce->setUser($this);
        }

        return $this;
    }

    public function removeAnnonce(Annonce $annonce): self
    {
        if ($this->annonces->removeElement($annonce)) {
            // set the owning side to null (unless already changed)
            if ($annonce->getUser() === $this) {
                $annonce->setUser(null);
            }
        }

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(?string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(?string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getMobile(): ?string
    {
        return $this->mobile;
    }

    public function setMobile(?string $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->codePostal;
    }

    public function setCodePostal(?string $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }
}

```

## ACTIVITE POUR LE RESTE DE LA MATINEE

    AUTONOMIE INDIVIDUELLE
    OU
    AUTONOMIE EN EQUIPE

    N'HESITEZ PAS A POSER DES QUESTIONS...
    




