<?php
namespace App\Contracts\Repositories;

interface TagRepository extends BaseRepository
{
	public function paginate();
   
}