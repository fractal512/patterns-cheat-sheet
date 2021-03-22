<?php


namespace App\DesignPatterns\Creational\Builder;


use App\DesignPatterns\Creational\Builder\Interfaces\BlogPostBuilderInterface;

class BlogPostManager
{
    private $builder;

    public function setBuilder(BlogPostBuilderInterface $builder)
    {
        $this->builder = $builder;
        return $this;
    }

    public function createCleanPost()
    {
        $blogPost = $this->builder->getBlogPost();
        return $blogPost;
    }

    public function createNewPostIt()
    {
        $blogPost = $this->builder
            ->setTitle('New post about IT')
            ->setBody('New post about IT...')
            ->setCategories([
                'it-category' => 'IT'
            ])
            ->setTags([
                'it-tag' => 'IT',
                'programming-tag' => 'Programming'
            ])
            ->getBlogPost();

        return $blogPost;
    }

    public function createNewPostCats()
    {
        $blogPost = $this->builder
            ->setTitle('New post about cats')
            ->setCategories([
                'cats-category' => 'Cats'
            ])
            ->setTags([
                'cats-tag' => 'Cats',
                'pets-tag' => 'Pets'
            ])
            ->getBlogPost();

        return $blogPost;
    }
}
