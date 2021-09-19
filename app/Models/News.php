<?php declare(strict_types=1);

namespace App\Models;

use Faker\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class News extends Model
{
   protected $table = "news";

   public function getNews(): Collection
   {

	   return \DB::table($this->table)
		   ->join('categories', 'categories.id', '=', 'news.category_id')
		   ->select("news.*","categories.id as categoryId","categories.title as categoryTitle")
		   //->whereBetween('news.id', [1,5])
		   /*->where([
			   ['news.id', '>', 6],
			   ['categories.id', '<', 2]
		   ])*/

		//   ->orWhere('news.title', 'like', '%'.request()->get('query').'%')
		   //->orderBy('news.id', 'desc')
		   ->get();
   }

   public function getNewsById(int $id, int $idCategory)
   {
	   return \DB::table($this->table)
   	    ->join('categories', 'categories.id', '=', 'news.category_id')
	    ->select("news.*","categories.id as categoryId","categories.title as categoryTitle")
	    ->where([
			   ['news.id', '=', $id],
			   ['categories.id', '=', $idCategory]
		   ])
            ->get();
   }
   
   public function getNewsByCategoryId(int $idCategory)
   {
   	    return \DB::table($this->table)
   	    ->join('categories', 'categories.id', '=', 'news.category_id')
	    ->select("news.*","categories.id as categoryId","categories.title as categoryTitle")
	    ->where('categories.id', '=', $idCategory)
            ->get();
   }
}
