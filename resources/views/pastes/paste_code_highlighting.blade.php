<!DOCTYPE html>
<meta charset=utf-8>
<title>Syntax Highlighting</title>
<link rel="stylesheet"
      href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/styles/github-dark.min.css">
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<body>

<pre>
<code class="plaintext">// this is some sample for text
$i = 0;
for ($i = 0; $i &lt; 25; ++$i) {
    echo $i;
}

# comment like this
function customFunction()
{
    return mt_rand(1, 100);
}


}</code>
</pre>

<pre>
<code data-language="php">&lt;?php

namespace Sonic;

/**
 * Util
 *
 * @category Sonic
 * @package Util
 * @author Craig Campbell
 */
class Util
{
    /**
     * deletes a directory recursively
     *
     * php's native rmdir() function only removes a directory if there is nothing in it
     *
     * @param string $path
     * @return void
     */
    public static function removeDir($path)
    {
        if (is_link($path)) {
            return unlink($path);
        }

        $files = new \RecursiveDirectoryIterator($path);
        foreach ($files as $file) {
            if (in_array($file->getFilename(), array('.', '..'))) {
                continue;
            }

            if ($file->isLink()) {
                unlink($file->getPathName());
                continue;
            }

            if ($file->isFile()) {
                unlink($file->getRealPath());
                continue;
            }

            if ($file->isDir()) {
                self::removeDir($file->getRealPath());
            }
        }
        return rmdir($path);
    }
}
</code>
</pre>


</body>
