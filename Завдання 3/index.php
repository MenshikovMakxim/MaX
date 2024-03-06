<?php
function Text($txt)
{

    //$pattern = '/[\W \d]/';
    $pattern = '/[^\p{L}]/u';
    $str = preg_replace($pattern, '',$txt);
    echo $str.PHP_EOL;
    echo PHP_EOL;
    $res = '';
    for($i = 0; $i < mb_strlen($str, 'utf-8'); $i++){
        if($i % 2 == 0){
            $res = mb_strtoupper(mb_substr($str, $i, 1, 'utf-8'));
        } else {
            $res = mb_strtolower(mb_substr($str, $i, 1, 'utf-8'));
        }
        echo $res;
    }
}

Text(" єїяMr. and Mrs.її Dursley lived вв at  number four Privet 56Drive and always proudly єєєdeclared that, thank God, they were absolutely normal people. 
It was impossible to expect from anyone, but from them, that they w90-ould find 90-themselve-0=s in some strange or mysterious situation. Mr. and Mrs. Dursley 
were very disapproving of any oddities, riddles an890d other nonsense.
Mr. Dursley headed a company called Grunnings, which specialized in the m===anufacture of drills. He was a plump man 
with a very 234rewbu56shy mustache and a very short neck. As for Mrs. 56Dursley, she was a skinny blonde with a neck almost twice as long as 
it should have been for her height. However, this diiuolkj345sadvantage came in handy for her, since most of the time Mrs. Dursley watched
her neighbors and eavesdroppe45d on their conversations. And with a neck like h89ers, it was very convenie78nt to look over other people’s fences. 
Mr. and Mrs. Dursley had a little son named Dudley, and in their opinion he was the most wonderful child in the world.
The Dursley family had 345345everything she 56756could want.---- But they also had one secret. Moreover, more than anything else, 
they were afraid that someone would find out about him. The Dursleys couldn't even imagine what would happen to them ");


/*Написати функцію, яка приймає текстовий рядок (200 слів).

В даному тексті функція має видалити пробіли, знаки пунктуації, числа та переформатувати текст наступним чином:
"АаАаАаА" - чередування великих та маленьких літер.

Використовувати вбудовані функції PHP.*/