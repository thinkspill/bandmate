<?php

$factory->define(App\Album::class, function (Faker\Generator $faker) {
    $albumGenerator = new \Nubs\RandomNameGenerator\All(
        [
            new \Nubs\RandomNameGenerator\Vgng()
        ]
    );

    $labelGenerator = new \Nubs\RandomNameGenerator\All(
        [
            new \Nubs\RandomNameGenerator\Alliteration()
        ]
    );

    $genres = explode("\n", 'Blues
Acapella
Accoustic
Acid
Acid Jazz
Acid Punk
Alternative
AlternRock
Ambient
Anime
Avantgarde
Ballad
Bass
Beat
Bebop
Big Band
Black Metal
Bluegrass
Booty Bass
BritPop
Cabaret
Celtic
Chamber Music
Chanson
Chorus
Christian Gangsta Rap
Christian Rap
Christian Rock
Classical
Classic Rock
Club
Club-House
Comedy
Contemporary Christian
Country
Crossover
Cult
Dance
Dance Hall
Darkwave
Death Metal
Disco
Dream
Drum & Bass
Drum Solo
Duet
Easy Listening
Electronic
Ethnic
Euro-House
Euro-Techno
Eurodance
Folk
Folk/Rock
Folklore
Freestyle
Funk
Fusion
Fusion
Game
Gangsta
Goa
Gospel
Gothic
Gothic Rock
Grunge
Hardcore
Hard Rock
Heavy Metal
Hip-Hop
House
Humour
Indie
Industrial
Instrumental
Instrumental Pop
Instrumental Rock
Jazz
Jazz+Funk
JPop
Jungle
Latin
Lo-Fi
Meditative
Merengue
Metal
Musical
National Folk
Native American
New Age
New Wave
Noise
Oldies
Opera
Other
Polka
Polsk Punk
Pop
Pop-Folk
Pop/Funk
Power Ballad
Pranks
Primus
Progressive Rock
Psychadelic
Psychedelic Rock
Punk
Punk Rock
R&B
Rap
Rave
Reggae
Retro
Revival
Rhytmic Soul
Rock
Rock & Roll
Salsa
Samba
Satire
Showtunes
Ska
Slow Jam
Slow Rock
Sonata
Soul
Sound Clip
Soundtrack
Southern Rock
Space
Speech
Swing
Symphonic Rock
Symphony
Synthpop
Tango
Techno
Techno-Industrial
Terror
Top 40
Trailer
Trance
Trash Metal
Tribal
Trip-Hop
Vocal
Unknown');

    $recordedDate = $faker->date('Y-m-d', '-4 years');
    $releaseDate = \Carbon\Carbon::createFromFormat('Y-m-d', $recordedDate)
                                 ->addMonths(random_int(1, 24))
                                 ->format('Y-m-d');
    return [
        'name' => $albumGenerator->getName(),
        'recorded_date' => $recordedDate,
        'release_date' => $releaseDate,
        'number_of_tracks' => $faker->numberBetween(5, 20),
        'label' => $labelGenerator->getName(),
        'producer' => $faker->name,
        'genre' => $faker->randomElement($genres),
        'band_id' => function () {
            return DB::table('bands')->inRandomOrder()->first()->id;
        }
    ];
});