<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GameRepository::class)]
class Game
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $created_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updated_at = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $begin_at = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $finished_at = null;

    #[ORM\Column]
    private ?bool $is_waiting = null;

    #[ORM\Column]
    private ?bool $is_pending = null;

    #[ORM\Column]
    private ?bool $is_twoVsTwo = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $scoreBlueTeam = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $scoreRedTeam = null;

    #[ORM\Column(length: 75, nullable: true)]
    private ?string $winner = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $winningReason = null;

    #[ORM\ManyToOne(inversedBy: 'vip_games')]
    private ?User $vip_player = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $invite_link = null;

    #[ORM\Column]
    private ?bool $is_friendly = null;

    #[ORM\ManyToOne(inversedBy: 'GameAsBlueTeam')]
    private ?Team $id_blueTeam = null;

    #[ORM\ManyToOne(inversedBy: 'GameAsRedTeam')]
    private ?Team $id_redTeam = null;

    /**
     * @var Collection<int, Bet>
     */
    #[ORM\OneToMany(targetEntity: Bet::class, mappedBy: 'id_game')]
    private Collection $bets;

    public function __construct()
    {
        $this->bets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getBeginAt(): ?\DateTimeInterface
    {
        return $this->begin_at;
    }

    public function setBeginAt(\DateTimeInterface $begin_at): static
    {
        $this->begin_at = $begin_at;

        return $this;
    }

    public function getFinishedAt(): ?\DateTimeImmutable
    {
        return $this->finished_at;
    }

    public function setFinishedAt(\DateTimeImmutable $finished_at): static
    {
        $this->finished_at = $finished_at;

        return $this;
    }

    public function isWaiting(): ?bool
    {
        return $this->is_waiting;
    }

    public function setWaiting(bool $is_waiting): static
    {
        $this->is_waiting = $is_waiting;

        return $this;
    }

    public function isPending(): ?bool
    {
        return $this->is_pending;
    }

    public function setPending(bool $is_pending): static
    {
        $this->is_pending = $is_pending;

        return $this;
    }

    public function isTwoVsTwo(): ?bool
    {
        return $this->is_twoVsTwo;
    }

    public function setTwoVsTwo(bool $is_twoVsTwo): static
    {
        $this->is_twoVsTwo = $is_twoVsTwo;

        return $this;
    }

    public function getScoreBlueTeam(): ?int
    {
        return $this->scoreBlueTeam;
    }

    public function setScoreBlueTeam(?int $scoreBlueTeam): static
    {
        $this->scoreBlueTeam = $scoreBlueTeam;

        return $this;
    }

    public function getScoreRedTeam(): ?int
    {
        return $this->scoreRedTeam;
    }

    public function setScoreRedTeam(?int $scoreRedTeam): static
    {
        $this->scoreRedTeam = $scoreRedTeam;

        return $this;
    }

    public function getWinner(): ?string
    {
        return $this->winner;
    }

    public function setWinner(?string $winner): static
    {
        $this->winner = $winner;

        return $this;
    }

    public function getWinningReason(): ?string
    {
        return $this->winningReason;
    }

    public function setWinningReason(?string $winningReason): static
    {
        $this->winningReason = $winningReason;

        return $this;
    }

    public function getVipPlayer(): ?User
    {
        return $this->vip_player;
    }

    public function setVipPlayer(?User $vip_player): static
    {
        $this->vip_player = $vip_player;

        return $this;
    }

    public function getInviteLink(): ?string
    {
        return $this->invite_link;
    }

    public function setInviteLink(?string $invite_link): static
    {
        $this->invite_link = $invite_link;

        return $this;
    }

    public function isFriendly(): ?bool
    {
        return $this->is_friendly;
    }

    public function setFriendly(bool $is_friendly): static
    {
        $this->is_friendly = $is_friendly;

        return $this;
    }

    public function getIdBlueTeam(): ?Team
    {
        return $this->id_blueTeam;
    }

    public function setIdBlueTeam(?Team $id_blueTeam): static
    {
        $this->id_blueTeam = $id_blueTeam;

        return $this;
    }

    public function getIdRedTeam(): ?Team
    {
        return $this->id_redTeam;
    }

    public function setIdRedTeam(?Team $id_redTeam): static
    {
        $this->id_redTeam = $id_redTeam;

        return $this;
    }

    /**
     * @return Collection<int, Bet>
     */
    public function getBets(): Collection
    {
        return $this->bets;
    }

    public function addBet(Bet $bet): static
    {
        if (!$this->bets->contains($bet)) {
            $this->bets->add($bet);
            $bet->setIdGame($this);
        }

        return $this;
    }

    public function removeBet(Bet $bet): static
    {
        if ($this->bets->removeElement($bet)) {
            // set the owning side to null (unless already changed)
            if ($bet->getIdGame() === $this) {
                $bet->setIdGame(null);
            }
        }

        return $this;
    }
}
