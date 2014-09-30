oDesk
=====

Print an associative array as an ASCII table. For example let’s say you have this array:

array(
    array(
        'Name' => 'Trixie',
        'Color' => 'Green',
        'Element' => 'Earth',
        'Likes' => 'Flowers'
        ),
    array(
        'Name' => 'Tinkerbell',
        'Element' => 'Air',
        'Likes' => 'Singning',
        'Color' => 'Blue'
        ), 
    array(
        'Element' => 'Water',
        'Likes' => 'Dancing',
        'Name' => 'Blum',
        'Color' => 'Pink'
        ),
);

And expect this output:


+----------+---------+---------+----------+
| Name     | Color   | Element |  Likes   |
+----------+---------+---------+----------+
| Trixie   | Green   | Earth   | Flowers  |
| Tinker   | Blue    | Air     | Singing  |
| Blum     | Pink    | Water   | Dancing  |
+----------+---------+---------+----------+

Can you color each column in a different color? 
Please provide a fully unittest covered functionality.

Unit Test
---------

The Unit Test uses PHPUnit
