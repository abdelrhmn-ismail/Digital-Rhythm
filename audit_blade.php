<?php
$dirs = [
    'if' => 'endif',
    'foreach' => 'endforeach',
    'forelse' => 'endforelse',
    'error' => 'enderror',
    'push' => 'endpush',
    'auth' => 'endauth',
    'guest' => 'endguest',
    'can' => 'endcan',
    'unless' => 'endunless',
    'isset' => 'endisset',
    'empty' => 'endempty'
];
$itr = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('d:/workarea/Digital-Rhythm/resources/views'));
foreach($itr as $file) {
    if ($file->getExtension() == 'php') {
        $contents = file_get_contents($file->getPathname());
        foreach($dirs as $start => $end) {
            $startCount = preg_match_all('/@'.$start.'\b/', $contents);
            $endCount = preg_match_all('/@'.$end.'\b/', $contents);
            if ($start === 'if') {
                $startCount += preg_match_all('/@hasSection\b/', $contents);
            }
            if ($startCount !== $endCount) {
                echo $file->getPathname() . ' : @' . $start . ' (' . $startCount . ') vs @' . $end . ' (' . $endCount . ")\n";
            }
        }
    }
}
