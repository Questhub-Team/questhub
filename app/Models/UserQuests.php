<?php  
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserQuests extends Model
{
    protected $table = 'user_quests';

    protected $fillable = ['user_id', 'event_id', 'completed'];
}