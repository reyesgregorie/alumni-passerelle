<?php

namespace App\Entity;

use App\Repository\UsersRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=UsersRepository::class)
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class Users implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;


    /**
     * @var string
     * @Assert\NotBlank(message="le titre est obligatoire")
     * @ORM\Column(name="firstName", type="string", length=50, nullable=false)
     */
    private $firstname;

    /**
     * @var string
     * @Assert\NotBlank(message="ce contenu est obligatoire")
     * @ORM\Column(name="lastName", type="string", length=50, nullable=false)
     */
    private $lastname;

    /**
     * @var string
     * @Assert\NotBlank(message="ce contenu est obligatoire")
     * @ORM\Column(name="role", type="string", length=50, nullable=false)
     */
    private $role = "ROLE_USER";

    /**
     * @var string|null
     *
     * @ORM\Column(name="city", type="string", length=70, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     * @Assert\NotBlank(message="ce contenu est obligatoire")
     */
    private $email;


    /**
     * @var string|null
     * @Assert\NotBlank(message="email obligatoire")
     * @ORM\Column(name="urlPhoto", type="string", length=255, nullable=true)
     */
    private $urlphoto;

    /**
     * @var string|null
     *
     * @ORM\Column(name="urlAvatar", type="string", length=100, nullable=true)
     */
    private $urlavatar;

    /**
     * @var string
     * @Assert\NotBlank(message="ce contenu est obligatoire")
     * @ORM\Column(name="promotion", type="string", length=50, nullable=false)
     */
    private $promotion;

    /**
     * @var string|null
     * @Assert\NotBlank(message=" contenu est  onligatoire")
     *
     * @ORM\Column(name="experiences", type="text", length=65535, nullable=true)
     */
    private $experiences;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="actual", type="boolean", nullable=true)
     */
    private $actual;

    /**
     * @var string|null
     *
     * @ORM\Column(name="bio", type="text", length=65535, nullable=true)
     */
    private $bio;

    /**
     * @var string|null
     *
     * @ORM\Column(name="companyName", type="text", length=65535, nullable=true)
     */
    private $companyname;

    /**
     * @var string|null
     *
     * @ORM\Column(name="urlLinkedin", type="string", length=255, nullable=true)
     */
    private $urllinkedin;

    /**
     * @var string|null
     *
     * @ORM\Column(name="urlPortfolio", type="string", length=255, nullable=true)
     */
    private $urlportfolio;


    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     * @ORM\Column(name="date_create", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateCreate = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_update", type="datetime", nullable=false, options={"default"="CURRENT_TIMESTAMP"})
     */
    private $dateUpdate = 'CURRENT_TIMESTAMP';

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Events", inversedBy="user")
     * @ORM\JoinTable(name="userstoevents",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="Id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     *   }
     * )
     */
    private $event;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Groups", inversedBy="user")
     * @ORM\JoinTable(name="userstogroups",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="Id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *   }
     * )
     */
    private $group;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->event = new \Doctrine\Common\Collections\ArrayCollection();
        $this->group = new \Doctrine\Common\Collections\ArrayCollection();
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
        return [$this->role];
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

    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;

        return $this;
    }

    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;

        return $this;
    }

    public function getRole(): ?string
    {
        return $this->role;
    }

    public function setRole(string $role): self
    {
        $this->role = $role;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getUrlphoto(): ?string
    {
        return $this->urlphoto;
    }

    public function setUrlphoto(?string $urlphoto): self
    {
        $this->urlphoto = $urlphoto;

        return $this;
    }

    public function getUrlavatar(): ?string
    {
        return $this->urlavatar;
    }

    public function setUrlavatar(?string $urlavatar): self
    {
        $this->urlavatar = $urlavatar;

        return $this;
    }

    public function getPromotion(): ?string
    {
        return $this->promotion;
    }

    public function setPromotion(string $promotion): self
    {
        $this->promotion = $promotion;

        return $this;
    }

    public function getExperiences(): ?string
    {
        return $this->experiences;
    }

    public function setExperiences(?string $experiences): self
    {
        $this->experiences = $experiences;

        return $this;
    }

    public function getActual(): ?bool
    {
        return $this->actual;
    }

    public function setActual(?bool $actual): self
    {
        $this->actual = $actual;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getCompanyname(): ?string
    {
        return $this->companyname;
    }

    public function setCompanyname(?string $companyname): self
    {
        $this->companyname = $companyname;

        return $this;
    }

    public function getUrllinkedin(): ?string
    {
        return $this->urllinkedin;
    }

    public function setUrllinkedin(?string $urllinkedin): self
    {
        $this->urllinkedin = $urllinkedin;

        return $this;
    }

    public function getUrlportfolio(): ?string
    {
        return $this->urlportfolio;
    }

    public function setUrlportfolio(?string $urlportfolio): self
    {
        $this->urlportfolio = $urlportfolio;

        return $this;
    }

    public function getDateCreate(): ?\DateTimeInterface
    {
        return $this->dateCreate;
    }

    public function setDateCreate(\DateTimeInterface $dateCreate): self
    {
        $this->dateCreate = $dateCreate;

        return $this;
    }

    public function getDateUpdate(): ?\DateTimeInterface
    {
        return $this->dateUpdate;
    }

    public function setDateUpdate(\DateTimeInterface $dateUpdate): self
    {
        $this->dateUpdate = $dateUpdate;

        return $this;
    }

    /**
     * @return Collection|Events[]
     */
    public function getEvent(): Collection
    {
        return $this->event;
    }

    public function addEvent(Events $event): self
    {
        if (!$this->event->contains($event)) {
            $this->event[] = $event;
        }

        return $this;
    }

    public function removeEvent(Events $event): self
    {
        if ($this->event->contains($event)) {
            $this->event->removeElement($event);
        }

        return $this;
    }

    /**
     * @return Collection|Groups[]
     */
    public function getGroup(): Collection
    {
        return $this->group;
    }

    public function addGroup(Groups $group): self
    {
        if (!$this->group->contains($group)) {
            $this->group[] = $group;
        }

        return $this;
    }

    public function removeGroup(Groups $group): self
    {
        if ($this->group->contains($group)) {
            $this->group->removeElement($group);
        }

        return $this;
    }

    public function setPublicationDate(\DateTime $param)
    {
    }
}
