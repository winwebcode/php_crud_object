<?php

/*
 In develop
 */
//namespace php_crud_object\Models\Articles;

class Article
{
    private $title;
    private $text;
    private $author;
    
    /*
    public function __construct(string $title, string $text, User $author)
    {
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
    } */

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getAuthor(): User
    {
        return $this->author;
    }
    
    public function getsidebarPosts() {
          // Output links of posts
        $resultat = queryMysql("SELECT * FROM posts ORDER BY id_posts");
        if ($resultat->num_rows != 0) {	
            // Выводим таблицу:  , получаем число рядов в выборке
            for ($c=0; $c<10; $c++) {
                    echo "<tr>";
                    $f = $resultat->fetch_array(); 
                    echo "<a href='$f[postname]'>$f[postname]</a><br>";
            }

        }
        else {
            echo "<div align='center'>Посты не найдены</div>";
        }
        
    }
}
