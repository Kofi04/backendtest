<?php
// filepath: /c:/wamp64/www/backend/app/Models/Commande.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commandes extends Model
{
    use HasFactory;

    protected $fillable = [
        'quantite', 'user_id', 'produits_id',
    ];
    public function produits()
    {
        return $this->belongsTo(produits::class, 'produits_id');
    }
}
