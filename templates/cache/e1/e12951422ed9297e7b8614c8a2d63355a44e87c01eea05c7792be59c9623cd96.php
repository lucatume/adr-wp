<?php

/* posts.twig */
class __TwigTemplate_c2ebd72ebfcaba3eb0d983964349686b66eb8f91c4c86bb8e373240711f52a60 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<html>
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\"
          content=\"width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"ie=edge\">
    <title>Posts</title>
</head>
<body>
<main class=\"posts\">
    ";
        // line 11
        if (isset($context["posts"])) { $_posts_ = $context["posts"]; } else { $_posts_ = null; }
        if ($_posts_) {
            // line 12
            echo "        <ul>
            ";
            // line 13
            if (isset($context["posts"])) { $_posts_ = $context["posts"]; } else { $_posts_ = null; }
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($_posts_);
            foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
                // line 14
                echo "                <li class=\"post\">
                    <h3>";
                // line 15
                if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_post_, "post_title", array()), "html", null, true);
                echo "</h3>
                    ";
                // line 16
                if (isset($context["post"])) { $_post_ = $context["post"]; } else { $_post_ = null; }
                echo twig_escape_filter($this->env, $this->getAttribute($_post_, "post_content", array()), "html", null, true);
                echo "
                </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "        </ul>
    ";
        } else {
            // line 21
            echo "        <p>Nothing found...</p>
    ";
        }
        // line 23
        echo "</main>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "posts.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 23,  64 => 21,  60 => 19,  50 => 16,  45 => 15,  42 => 14,  37 => 13,  34 => 12,  31 => 11,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "posts.twig", "/var/www/html/wp-content/plugins/adr-wp/templates/posts.twig");
    }
}
