<?php

namespace App\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Serializer\Filter\GroupFilter;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiFilter;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\SearchFilter;
use App\Repository\UserRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ApiResource(
    formats: ['json'],
    collectionOperations: [
        'get' => ['normalization_context' => ['groups' => 'read:collection_user']],
        'post'=> ['denormalization_context' => ['groups' => 'write:item_user']]
    ],
    itemOperations: ['get'=>['normalization_context' => ['groups' => 'read:item_user']],'delete']
)]
#[ApiFilter(SearchFilter::class, properties: ['id' => 'exact', 'lastName' => 'partial'])]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    #[Groups(['read:collection_user'])]
    private $id;

    #[ORM\Column(type: 'string', length: 180, unique: true)]
    #[Groups(['read:item_user','write:item_user'])]
    #[Assert\Email(
        message: "l'email {{ value }} n'est pas un email valide.",
    )]
    private $email;

    #[ORM\Column(type: 'json')]
    #[Groups(['read:item_user','write:item_user'])]
    #[Assert\NotBlank(message:"le champ roles n'a pas été renseigné" ,)]
    private $roles = [];

    #[ORM\Column(type: 'string')]
    #[Groups(['read:item_user','write:item_user'])]
    #[Assert\NotBlank(message:"le champ password n'a pas été renseigné" ,)]
    private $password;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection_user','read:item_user','write:item_user'])]
    #[Assert\NotBlank(message:"le champ firstName n'a pas été renseigné" ,)]
    private $firstName;

    #[ORM\Column(type: 'string', length: 255)]
    #[Groups(['read:collection_user','read:item_user','write:item_user'])]
    #[Assert\NotBlank(message:"le champ lastName n'a pas été renseigné" ,)]
    private $lastName;

    #[ORM\ManyToOne(targetEntity: Customer::class, inversedBy: 'user')]
    #[Groups(['write:item_user'])]
    #[Assert\NotBlank(message:"le champ customer n'a pas été renseigné" ,)]
    private $customer;

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
    public function getUserIdentifier(): string
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
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getCustomer(): ?Customer
    {
        return $this->customer;
    }

    public function setCustomer(?Customer $customer): self
    {
        $this->customer = $customer;

        return $this;
    }
}
