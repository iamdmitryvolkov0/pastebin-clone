<!DOCTYPE html>
<meta charset=utf-8>
<title>Syntax Highlighting</title>
<link rel="stylesheet"
      href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/styles/github-dark.min.css">
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@11.7.0/build/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<body>
    <pre>
        <code class="{{$paste->language}}">
            <p>{{$paste->title}}</p>

            {{$paste->body}}
}       </code>
    </pre>
</body>
