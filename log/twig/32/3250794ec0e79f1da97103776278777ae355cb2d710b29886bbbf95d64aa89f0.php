<?php

/* layout.html */
class __TwigTemplate_d29065fd57d303b8cba3dcb98b3de4a3ad20237c63ac80d46b9943b26ebad302 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<title></title>
</head>
<body>

<header>header</header>
<content>
\t
\t";
        // line 11
        $this->displayBlock('content', $context, $blocks);
        // line 14
        echo "</content>
<footer>footer</footer>

</body>
</html>";
    }

    // line 11
    public function block_content($context, array $blocks = array())
    {
        // line 12
        echo "\t
\t";
    }

    public function getTemplateName()
    {
        return "layout.html";
    }

    public function getDebugInfo()
    {
        return array (  45 => 12,  42 => 11,  34 => 14,  32 => 11,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
\t<title></title>
</head>
<body>

<header>header</header>
<content>
\t
\t{% block content %}
\t
\t{% endblock %}
</content>
<footer>footer</footer>

</body>
</html>", "layout.html", "C:\\wamp\\www\\myFramework\\app\\viwes\\layout.html");
    }
}
