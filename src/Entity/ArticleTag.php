<?php

namespace App\Entity;

use App\Repository\ArticleTagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ArticleTagRepository::class)]
class ArticleTag
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    /**
     * @var Collection<int, Article>
     */
    #[ORM\ManyToMany(targetEntity: Article::class)]
    private Collection $article_id;

    /**
     * @var Collection<int, Tag>
     */
    #[ORM\ManyToMany(targetEntity: Tag::class)]
    private Collection $tag_id;

    public function __construct()
    {
        $this->article_id = new ArrayCollection();
        $this->tag_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticleId(): Collection
    {
        return $this->article_id;
    }

    public function addArticleId(Article $articleId): static
    {
        if (!$this->article_id->contains($articleId)) {
            $this->article_id->add($articleId);
        }

        return $this;
    }

    public function removeArticleId(Article $articleId): static
    {
        $this->article_id->removeElement($articleId);

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getTagId(): Collection
    {
        return $this->tag_id;
    }

    public function addTagId(Tag $tagId): static
    {
        if (!$this->tag_id->contains($tagId)) {
            $this->tag_id->add($tagId);
        }

        return $this;
    }

    public function removeTagId(Tag $tagId): static
    {
        $this->tag_id->removeElement($tagId);

        return $this;
    }
}
