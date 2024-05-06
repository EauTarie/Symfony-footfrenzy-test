<?php

namespace App\Entity;

use App\Repository\TeamRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TeamRepository::class)]
class Team
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 75)]
    private ?string $name = null;

    #[ORM\Column(length: 35, nullable: true)]
    private ?string $slogan = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $pointsNumber = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\Column]
    private ?bool $is_recruiting = null;

    #[ORM\Column]
    private ?bool $is_dissolute = null;

    #[ORM\Column]
    private ?int $totalPointEarned = null;

    /**
     * @var Collection<int, UserTeam>
     */
    #[ORM\OneToMany(targetEntity: UserTeam::class, mappedBy: 'id_team')]
    private Collection $userTeams;

    /**
     * @var Collection<int, Game>
     */
    #[ORM\OneToMany(targetEntity: Game::class, mappedBy: 'id_blueTeam')]
    private Collection $GameAsBlueTeam;

    /**
     * @var Collection<int, Game>
     */
    #[ORM\OneToMany(targetEntity: Game::class, mappedBy: 'id_redTeam')]
    private Collection $GameAsRedTeam;

    /**
     * @var Collection<int, ItemTeamCollection>
     */
    #[ORM\OneToMany(targetEntity: ItemTeamCollection::class, mappedBy: 'id_team')]
    private Collection $itemTeamCollections;

    public function __construct()
    {
        $this->userTeams = new ArrayCollection();
        $this->GameAsBlueTeam = new ArrayCollection();
        $this->GameAsRedTeam = new ArrayCollection();
        $this->itemTeamCollections = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(?string $slogan): static
    {
        $this->slogan = $slogan;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPointsNumber(): ?int
    {
        return $this->pointsNumber;
    }

    public function setPointsNumber(int $pointsNumber): static
    {
        $this->pointsNumber = $pointsNumber;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeImmutable $created_at): static
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(?\DateTimeInterface $updated_at): static
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function isRecruiting(): ?bool
    {
        return $this->is_recruiting;
    }

    public function setRecruiting(bool $is_recruiting): static
    {
        $this->is_recruiting = $is_recruiting;

        return $this;
    }

    public function isDissolute(): ?bool
    {
        return $this->is_dissolute;
    }

    public function setDissolute(bool $is_dissolute): static
    {
        $this->is_dissolute = $is_dissolute;

        return $this;
    }

    public function getTotalPointEarned(): ?int
    {
        return $this->totalPointEarned;
    }

    public function setTotalPointEarned(int $totalPointEarned): static
    {
        $this->totalPointEarned = $totalPointEarned;

        return $this;
    }

    /**
     * @return Collection<int, UserTeam>
     */
    public function getUserTeams(): Collection
    {
        return $this->userTeams;
    }

    public function addUserTeam(UserTeam $userTeam): static
    {
        if (!$this->userTeams->contains($userTeam)) {
            $this->userTeams->add($userTeam);
            $userTeam->setIdTeam($this);
        }

        return $this;
    }

    public function removeUserTeam(UserTeam $userTeam): static
    {
        if ($this->userTeams->removeElement($userTeam)) {
            // set the owning side to null (unless already changed)
            if ($userTeam->getIdTeam() === $this) {
                $userTeam->setIdTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGameAsBlueTeam(): Collection
    {
        return $this->GameAsBlueTeam;
    }

    public function addGameAsBlueTeam(Game $gameAsBlueTeam): static
    {
        if (!$this->GameAsBlueTeam->contains($gameAsBlueTeam)) {
            $this->GameAsBlueTeam->add($gameAsBlueTeam);
            $gameAsBlueTeam->setIdBlueTeam($this);
        }

        return $this;
    }

    public function removeGameAsBlueTeam(Game $gameAsBlueTeam): static
    {
        if ($this->GameAsBlueTeam->removeElement($gameAsBlueTeam)) {
            // set the owning side to null (unless already changed)
            if ($gameAsBlueTeam->getIdBlueTeam() === $this) {
                $gameAsBlueTeam->setIdBlueTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Game>
     */
    public function getGameAsRedTeam(): Collection
    {
        return $this->GameAsRedTeam;
    }

    public function addGameAsRedTeam(Game $gameAsRedTeam): static
    {
        if (!$this->GameAsRedTeam->contains($gameAsRedTeam)) {
            $this->GameAsRedTeam->add($gameAsRedTeam);
            $gameAsRedTeam->setIdRedTeam($this);
        }

        return $this;
    }

    public function removeGameAsRedTeam(Game $gameAsRedTeam): static
    {
        if ($this->GameAsRedTeam->removeElement($gameAsRedTeam)) {
            // set the owning side to null (unless already changed)
            if ($gameAsRedTeam->getIdRedTeam() === $this) {
                $gameAsRedTeam->setIdRedTeam(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ItemTeamCollection>
     */
    public function getItemTeamCollections(): Collection
    {
        return $this->itemTeamCollections;
    }

    public function addItemTeamCollection(ItemTeamCollection $itemTeamCollection): static
    {
        if (!$this->itemTeamCollections->contains($itemTeamCollection)) {
            $this->itemTeamCollections->add($itemTeamCollection);
            $itemTeamCollection->setIdTeam($this);
        }

        return $this;
    }

    public function removeItemTeamCollection(ItemTeamCollection $itemTeamCollection): static
    {
        if ($this->itemTeamCollections->removeElement($itemTeamCollection)) {
            // set the owning side to null (unless already changed)
            if ($itemTeamCollection->getIdTeam() === $this) {
                $itemTeamCollection->setIdTeam(null);
            }
        }

        return $this;
    }
}
