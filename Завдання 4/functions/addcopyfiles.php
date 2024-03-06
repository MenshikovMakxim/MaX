<?php
    function copyfiles(string $file1, string $file2,array $newname)
    {
        $filles = getfiles($file1);
        foreach ($newname as $fi) {
            foreach ($filles as $fil) {
                copy($file1 . '/' . $fil, $file2 . '/' . $fi);
            }
        }
    }
