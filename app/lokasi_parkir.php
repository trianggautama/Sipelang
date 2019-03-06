<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lokasi_parkir extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jukir_id','zona_id', 'address', 'latitude', 'longitude','creator_id',
    ];

    public function jukir(){
        return $this->belongsTo('App\jukir');
      }
    public function zona(){
        return $this->belongsTo('App\zona');
      }
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    public $appends = [
        'coordinate', 'map_popup_content',
    ];

    /**
     * Get outlet name_link attribute.
     *
     * @return string
     */
    public function getNameLinkAttribute()
    {
        $title = __('app.show_detail_title', [
            'address' => $this->address, 'type' => __('lokasi_parkir.lokasi_parkir'),
        ]);
        $link = '<a href="'.route('outlets.show', $this).'"';
        $link .= ' title="'.$title.'">';
        $link .= $this->address;
        $link .= '</a>';

        return $link;
    }

    /**
     * Outlet belongs to User model relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function creator()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get outlet coordinate attribute.
     *
     * @return string|null
     */
    public function getCoordinateAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude.', '.$this->longitude;
        }
    }

    /**
     * Get outlet map_popup_content attribute.
     *
     * @return string
     */
    public function getMapPopupContentAttribute()
    {
        $mapPopupContent = '';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('lokasi_parkir.address').':</strong><br>'.$this->name_link.'</div>';
        $mapPopupContent .= '<div class="my-2"><strong>'.__('lokasi_parkir.coordinate').':</strong><br>'.$this->coordinate.'</div>';

        return $mapPopupContent;
    }
}
