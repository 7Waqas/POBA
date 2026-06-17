<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'gender', 'role', 'permissions',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
            'permissions'       => 'array',
        ];
    }

    public function isSuperAdmin(): bool { return $this->role === 'superadmin'; }
    public function isAdmin(): bool      { return $this->role === 'admin'; }

    public function hasPermission(string $permission): bool
    {
        if ($this->isSuperAdmin()) return true;
        return in_array($permission, $this->permissions ?? [], true);
    }

    public function hasAnyPermission(array $permissions): bool
    {
        if ($this->isSuperAdmin()) return true;
        foreach ($permissions as $p) {
            if ($this->hasPermission($p)) return true;
        }
        return false;
    }

    public static function allPermissions(): array
    {
        return [
            'alumni_users' => 'Alumni Users (View, Approve, Reject)',
            'events'       => 'Events (Create, Edit, Delete)',
            'news'         => 'News (Create, Edit, Delete)',
            'verticals'    => 'Verticals / Committees',
            'gallery'      => 'Gallery (Folders & Images)',
            'contact'      => 'Contact & Bank Details',
            'promotions'   => 'Promotions',
            'faqs'         => 'FAQs',
            'homepage'     => 'Homepage CMS',
            'about'        => 'About Us CMS',
            'admin_users'  => 'Admin Users (SuperAdmin only)',
            'seo'          => 'SEO Settings',
            'footer'       => 'Footer Settings',
        ];
    }
}