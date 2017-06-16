<?php

/* twig/block-blog-design.twig */
class __TwigTemplate_abd040385516cd80ed8042ea8fc77ddad9a71a22dedb7f5835c01eea7269a0c8 extends Twig_Template
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
        echo "<li class=\"blog-box\">
    <div class=\"blog-list-inner check-clippath inner\">
        <h2 class=\"post-title\">";
        // line 3
        echo ($context["posttitle"] ?? null);
        echo "</h2>
        <div class=\"post-detail\">
            <span class=\"post-date\">";
        // line 5
        echo ($context["postdate"] ?? null);
        echo "</span>
            <span class=\"post-leestijd\"><i class=\"iconc-clock\"></i> ";
        // line 6
        echo ($context["leestijd"] ?? null);
        echo " ";
        echo ($context["fieldleestijd"] ?? null);
        echo "</span>
        </div>
        <div class=\"post-content\">
            <p>";
        // line 9
        echo ($context["postcontent"] ?? null);
        echo "</p>
        </div>
        <div class=\"post-author\">
            <div class=\"post-author-inner\">
                <div class=\"author-detail\">
                    <div class=\"author-avatar\">
                        <img src=\"";
        // line 15
        echo ($context["avatarurl"] ?? null);
        echo "\" />
                    </div>
                    <span class=\"author-title\">
                        <div>";
        // line 18
        echo ($context["door"] ?? null);
        echo "</div>
                        <div class=\"author-name\">";
        // line 19
        echo ($context["fieldauthor"] ?? null);
        echo "</div>
                    </span>
                </div>
                <div class=\"post-link text-right\">
                    <a class=\"btn btn-nobg font-soho-medium\" href=\"";
        // line 23
        echo ($context["singleurl"] ?? null);
        echo "\">";
        echo ($context["lees"] ?? null);
        echo " <i class=\"iconc-arrow-button\"></i></a>
                </div>
            </div>
        </div>
    </div>
</li>";
    }

    public function getTemplateName()
    {
        return "twig/block-blog-design.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 23,  59 => 19,  55 => 18,  49 => 15,  40 => 9,  32 => 6,  28 => 5,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<li class=\"blog-box\">
    <div class=\"blog-list-inner check-clippath inner\">
        <h2 class=\"post-title\">{{posttitle}}</h2>
        <div class=\"post-detail\">
            <span class=\"post-date\">{{postdate}}</span>
            <span class=\"post-leestijd\"><i class=\"iconc-clock\"></i> {{leestijd}} {{fieldleestijd}}</span>
        </div>
        <div class=\"post-content\">
            <p>{{postcontent}}</p>
        </div>
        <div class=\"post-author\">
            <div class=\"post-author-inner\">
                <div class=\"author-detail\">
                    <div class=\"author-avatar\">
                        <img src=\"{{avatarurl}}\" />
                    </div>
                    <span class=\"author-title\">
                        <div>{{door}}</div>
                        <div class=\"author-name\">{{fieldauthor}}</div>
                    </span>
                </div>
                <div class=\"post-link text-right\">
                    <a class=\"btn btn-nobg font-soho-medium\" href=\"{{singleurl}}\">{{lees}} <i class=\"iconc-arrow-button\"></i></a>
                </div>
            </div>
        </div>
    </div>
</li>", "twig/block-blog-design.twig", "/srv/www/splintt.com/current/web/app/themes/oye/twig/block-blog-design.twig");
    }
}
