<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about')->insert([
            'title' => 'About Us',
            'text' => '
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi mollis ac est eget blandit. 
                    Phasellus nisi mi, mollis eu dolor egestas, varius ultricies nisi. Phasellus consequat luctus quam, 
                    nec pharetra metus aliquet eget. Proin pharetra tellus et consequat maximus. Phasellus malesuada pharetra 
                    lacus ac euismod. Morbi vestibulum nec leo eu maximus. Quisque sollicitudin urna at hendrerit scelerisque.
                </p>
                <p>
                    Integer in imperdiet nibh. Curabitur porttitor dui sodales nisi dictum imperdiet. Nullam varius dui sed elit tempus,
                    malesuada gravida libero vehicula. Sed lobortis turpis tincidunt odio finibus, quis rutrum orci feugiat. Mauris placerat, 
                    nunc non porttitor elementum, arcu lacus sodales nulla, sit amet commodo felis ligula vitae lectus. Nunc nulla neque, eleifend 
                    non congue a, viverra eu lacus. Vestibulum mollis convallis aliquam. Nulla sit amet scelerisque diam. Donec mattis mauris vitae 
                    eros rutrum rhoncus. Vivamus commodo pharetra massa. Donec ipsum enim, facilisis eu lectus quis, laoreet viverra massa. 
                    Nam rutrum porta ultrices. Sed id posuere quam.
                </p>
                <p>
                    Vivamus massa odio, venenatis eu semper sed, dictum quis lacus. Donec varius ligula eget viverra cursus. Fusce quis elementum felis, 
                    id suscipit enim. Integer neque nulla, dignissim at orci sit amet, semper pharetra lectus. In feugiat, tortor nec hendrerit porttitor, 
                    urna eros eleifend nibh, vel euismod nulla felis at libero. Donec consectetur, neque id fringilla imperdiet, sapien ligula sagittis elit, 
                    eu rhoncus augue turpis sit amet purus. Aliquam eget rutrum tellus.
                </p>
                <p>
                    Mauris pharetra auctor finibus. Nullam in nisl et justo sagittis sagittis. Nulla pretium quam at ligula feugiat, quis interdum nisl viverra. 
                    Aliquam ut vulputate tortor. Quisque placerat nibh et mollis blandit. Orci varius natoque penatibus et magnis dis parturient montes, nascetur 
                    ridiculus mus. Pellentesque a consectetur dui, eget cursus nunc. Sed pellentesque, metus id bibendum dignissim, justo purus accumsan lectus, 
                    eget lobortis nulla lacus in lacus. In sed mollis lectus, nec feugiat nisi. Aliquam efficitur dignissim malesuada. Integer consequat, velit 
                    quis viverra tristique, neque erat imperdiet odio, sit amet pulvinar eros tortor vel metus. Nullam rutrum lorem in dui auctor, nec lacinia ante 
                    dignissim. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas quis erat finibus, maximus sapien at, hendrerit diam. Morbi 
                    porttitor quis sem non dignissim. Aenean velit ligula, porttitor ac mattis eget, finibus et risus.
                </p>
                <p>
                    Pellentesque lobortis pharetra justo, vitae elementum magna tincidunt quis. Sed facilisis vestibulum elit ut molestie. Aliquam interdum vitae leo 
                    nec aliquet. Etiam a tincidunt nunc. Proin vitae arcu id libero tempus feugiat sed at massa. Sed vitae nibh porta, pretium nisi eu, fringilla nisl. 
                    Donec nisi metus, euismod ac nulla mattis, convallis sodales felis. Fusce hendrerit in mauris vitae faucibus. Praesent faucibus odio risus, sit amet 
                    eleifend massa euismod sed. Praesent mattis volutpat magna a imperdiet. Nulla placerat vulputate orci, a malesuada tortor dapibus id. Praesent quis 
                    erat sapien.
                </p>
            ',
        ]);
    }
}
