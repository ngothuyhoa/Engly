<?php
namespace App\Contracts\Repositories;

interface PostRepository extends BaseRepository
{
	public function paginate();
   
}