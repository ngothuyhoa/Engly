<?php
namespace App\Contracts\Repositories;

interface PostRepository extends BaseRepository
{
	public function paginate();
	public function findBySlug($slug);
   
}