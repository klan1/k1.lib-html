<?php
/**
 * k1.lib-html - Components Showcase - Index
 *
 * @author Alejandro Trujillo J. (J0hnd03)
 * @link https://github.com/klan1/k1.lib-html
 * @license Apache-2.0
 */

require_once __DIR__ . '/../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>k1.lib-html - Tags Showcase</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root { --bs-body-bg: #f8f9fa; }
        body { padding-top: 70px; background-color: var(--bs-body-bg); }
        .component-card {
            background: #fff;
            border-radius: .5rem;
            padding: 1.5rem;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
            transition: transform 0.2s, box-shadow 0.2s;
            height: 100%;
        }
        .component-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 .25rem .5rem rgba(0,0,0,.1);
        }
        .component-card h5 {
            color: #212529;
            font-weight: 600;
            margin-bottom: .5rem;
        }
        .component-card .ns {
            font-size: .75rem;
            color: #0d6efd;
            font-family: monospace;
        }
        .component-card .path {
            font-size: .7rem;
            color: #198754;
            font-family: monospace;
            margin-bottom: 1rem;
            display: block;
        }
        .component-card .btn {
            margin-top: auto;
        }
        .hero-section {
            background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
            color: white;
            padding: 3rem 2rem;
            border-radius: .5rem;
            margin-bottom: 2rem;
        }
        .hero-section h1 {
            font-weight: 700;
            margin-bottom: .5rem;
        }
        .hero-section p {
            opacity: 0.9;
            margin-bottom: 1.5rem;
        }
        .section-title {
            color: #6c757d;
            font-size: .75rem;
            text-transform: uppercase;
            letter-spacing: .1em;
            margin-bottom: 1rem;
            font-weight: 600;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-code-square me-2"></i> k1.lib-html
            </a>
            <span class="navbar-text text-white-50">Core HTML Tags</span>
        </div>
    </nav>

    <div class="container">
        <div class="hero-section">
            <h1><i class="bi bi-code-square me-2"></i> k1.lib-html - Tags</h1>
            <p>PHP library for building HTML documents using an object-oriented interface with chainable methods.</p>
            <a href="https://github.com/klan1/k1.lib-html" class="btn btn-light" target="_blank">
                <i class="bi bi-github me-1"></i> View on GitHub
            </a>
        </div>

        <div class="section-title">Text & Typography</div>
        <div class="row g-4 mb-4">
            <?php
            $textComponents = [
                ['name' => 'Heading (h1-h6)', 'file' => 'headings.php', 'ns' => '\k1lib\html\h1, \k1lib\html\h2...', 'desc' => 'Heading tags h1 through h6'],
                ['name' => 'Paragraph (p)', 'file' => 'paragraph.php', 'ns' => '\k1lib\html\p', 'desc' => 'Paragraph element'],
                ['name' => 'Span', 'file' => 'span.php', 'ns' => '\k1lib\html\span', 'desc' => 'Inline text container'],
                ['name' => 'Bold (b)', 'file' => 'bold.php', 'ns' => '\k1lib\html\b', 'desc' => 'Bold text'],
                ['name' => 'Emphasis (em)', 'file' => 'em.php', 'ns' => '\k1lib\html\em', 'desc' => 'Emphasized text'],
                ['name' => 'Strong', 'file' => 'strong.php', 'ns' => '\k1lib\html\strong', 'desc' => 'Strong importance text'],
                ['name' => 'Small', 'file' => 'small.php', 'ns' => '\k1lib\html\small', 'desc' => 'Smaller text'],
                ['name' => 'Line Break (br)', 'file' => 'br.php', 'ns' => '\k1lib\html\br', 'desc' => 'Line break element'],
                ['name' => 'Horizontal Rule (hr)', 'file' => 'hr.php', 'ns' => '\k1lib\html\hr', 'desc' => 'Horizontal rule'],
                ['name' => 'Code', 'file' => 'code.php', 'ns' => '\k1lib\html\code', 'desc' => 'Inline code element'],
                ['name' => 'Preformatted (pre)', 'file' => 'pre.php', 'ns' => '\k1lib\html\pre', 'desc' => 'Preformatted text block'],
            ];

            foreach ($textComponents as $comp):
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="component-card d-flex flex-column">
                    <h5><i class="bi bi-type me-2"></i><?= $comp['name'] ?></h5>
                    <code class="path"><?= $comp['ns'] ?></code>
                    <p class="text-muted small mb-auto"><?= $comp['desc'] ?></p>
                    <a href="tags/<?= $comp['file'] ?>" class="btn btn-outline-primary btn-sm">
                        View Example <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="section-title">Layout & Structure</div>
        <div class="row g-4 mb-4">
            <?php
            $layoutComponents = [
                ['name' => 'Div', 'file' => 'div.php', 'ns' => '\k1lib\html\div', 'desc' => 'Generic container element'],
                ['name' => 'Section', 'file' => 'section.php', 'ns' => '\k1lib\html\section', 'desc' => 'Sectional container'],
                ['name' => 'Article', 'file' => 'article.php', 'ns' => '\k1lib\html\article', 'desc' => 'Article element'],
                ['name' => 'Aside', 'file' => 'aside.php', 'ns' => '\k1lib\html\aside', 'desc' => 'Aside element'],
                ['name' => 'Header', 'file' => 'header.php', 'ns' => '\k1lib\html\header', 'desc' => 'Header element'],
                ['name' => 'Footer', 'file' => 'footer.php', 'ns' => '\k1lib\html\footer', 'desc' => 'Footer element'],
                ['name' => 'Nav', 'file' => 'nav.php', 'ns' => '\k1lib\html\nav', 'desc' => 'Navigation container'],
                ['name' => 'Main', 'file' => 'main.php', 'ns' => '\k1lib\html\main', 'desc' => 'Main content element'],
            ];

            foreach ($layoutComponents as $comp):
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="component-card d-flex flex-column">
                    <h5><i class="bi bi-layout-sidebar me-2"></i><?= $comp['name'] ?></h5>
                    <code class="path"><?= $comp['ns'] ?></code>
                    <p class="text-muted small mb-auto"><?= $comp['desc'] ?></p>
                    <a href="tags/<?= $comp['file'] ?>" class="btn btn-outline-primary btn-sm">
                        View Example <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="section-title">Lists</div>
        <div class="row g-4 mb-4">
            <?php
            $listComponents = [
                ['name' => 'Unordered List (ul)', 'file' => 'ul.php', 'ns' => '\k1lib\html\ul', 'desc' => 'Unordered list'],
                ['name' => 'Ordered List (ol)', 'file' => 'ol.php', 'ns' => '\k1lib\html\ol', 'desc' => 'Ordered list'],
                ['name' => 'List Item (li)', 'file' => 'li.php', 'ns' => '\k1lib\html\li', 'desc' => 'List item element'],
            ];

            foreach ($listComponents as $comp):
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="component-card d-flex flex-column">
                    <h5><i class="bi bi-list-ul me-2"></i><?= $comp['name'] ?></h5>
                    <code class="path"><?= $comp['ns'] ?></code>
                    <p class="text-muted small mb-auto"><?= $comp['desc'] ?></p>
                    <a href="tags/<?= $comp['file'] ?>" class="btn btn-outline-primary btn-sm">
                        View Example <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="section-title">Forms & Inputs</div>
        <div class="row g-4 mb-4">
            <?php
            $formComponents = [
                ['name' => 'Form', 'file' => 'form.php', 'ns' => '\k1lib\html\form', 'desc' => 'Form element'],
                ['name' => 'Input', 'file' => 'input.php', 'ns' => '\k1lib\html\input', 'desc' => 'Input field element'],
                ['name' => 'Textarea', 'file' => 'textarea.php', 'ns' => '\k1lib\html\textarea', 'desc' => 'Multi-line text input'],
                ['name' => 'Select', 'file' => 'select.php', 'ns' => '\k1lib\html\select', 'desc' => 'Dropdown select element'],
                ['name' => 'Option', 'file' => 'option.php', 'ns' => '\k1lib\html\option', 'desc' => 'Select option element'],
                ['name' => 'Label', 'file' => 'label.php', 'ns' => '\k1lib\html\label', 'desc' => 'Label element'],
                ['name' => 'Fieldset', 'file' => 'fieldset.php', 'ns' => '\k1lib\html\fieldset', 'desc' => 'Fieldset grouping'],
                ['name' => 'Legend', 'file' => 'legend.php', 'ns' => '\k1lib\html\legend', 'desc' => 'Fieldset legend'],
                ['name' => 'Button', 'file' => 'button.php', 'ns' => '\k1lib\html\button', 'desc' => 'Button element'],
            ];

            foreach ($formComponents as $comp):
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="component-card d-flex flex-column">
                    <h5><i class="bi bi-input-cursor-text me-2"></i><?= $comp['name'] ?></h5>
                    <code class="path"><?= $comp['ns'] ?></code>
                    <p class="text-muted small mb-auto"><?= $comp['desc'] ?></p>
                    <a href="tags/<?= $comp['file'] ?>" class="btn btn-outline-primary btn-sm">
                        View Example <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="section-title">Tables</div>
        <div class="row g-4 mb-4">
            <?php
            $tableComponents = [
                ['name' => 'Table', 'file' => 'table.php', 'ns' => '\k1lib\html\table', 'desc' => 'Table element'],
                ['name' => 'Table Head (thead)', 'file' => 'thead.php', 'ns' => '\k1lib\html\thead', 'desc' => 'Table head'],
                ['name' => 'Table Body (tbody)', 'file' => 'tbody.php', 'ns' => '\k1lib\html\tbody', 'desc' => 'Table body'],
                ['name' => 'Table Foot (tfoot)', 'file' => 'tfoot.php', 'ns' => '\k1lib\html\tfoot', 'desc' => 'Table foot'],
                ['name' => 'Table Row (tr)', 'file' => 'tr.php', 'ns' => '\k1lib\html\tr', 'desc' => 'Table row'],
                ['name' => 'Table Header (th)', 'file' => 'th.php', 'ns' => '\k1lib\html\th', 'desc' => 'Table header cell'],
                ['name' => 'Table Data (td)', 'file' => 'td.php', 'ns' => '\k1lib\html\td', 'desc' => 'Table data cell'],
                ['name' => 'Caption', 'file' => 'caption.php', 'ns' => '\k1lib\html\caption', 'desc' => 'Table caption'],
            ];

            foreach ($tableComponents as $comp):
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="component-card d-flex flex-column">
                    <h5><i class="bi bi-table me-2"></i><?= $comp['name'] ?></h5>
                    <code class="path"><?= $comp['ns'] ?></code>
                    <p class="text-muted small mb-auto"><?= $comp['desc'] ?></p>
                    <a href="tags/<?= $comp['file'] ?>" class="btn btn-outline-primary btn-sm">
                        View Example <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="section-title">Media & Links</div>
        <div class="row g-4 mb-4">
            <?php
            $mediaComponents = [
                ['name' => 'Anchor (a)', 'file' => 'a.php', 'ns' => '\k1lib\html\a', 'desc' => 'Hyperlink element'],
                ['name' => 'Image (img)', 'file' => 'img.php', 'ns' => '\k1lib\html\img', 'desc' => 'Image element'],
                ['name' => 'Iframe', 'file' => 'iframe.php', 'ns' => '\k1lib\html\iframe', 'desc' => 'Iframe element'],
                ['name' => 'Icon (i)', 'file' => 'i.php', 'ns' => '\k1lib\html\i', 'desc' => 'Icon/italic element'],
            ];

            foreach ($mediaComponents as $comp):
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="component-card d-flex flex-column">
                    <h5><i class="bi bi-link me-2"></i><?= $comp['name'] ?></h5>
                    <code class="path"><?= $comp['ns'] ?></code>
                    <p class="text-muted small mb-auto"><?= $comp['desc'] ?></p>
                    <a href="tags/<?= $comp['file'] ?>" class="btn btn-outline-primary btn-sm">
                        View Example <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="section-title">Document Structure</div>
        <div class="row g-4 mb-4">
            <?php
            $docComponents = [
                ['name' => 'HTML Document', 'file' => 'html_document.php', 'ns' => '\k1lib\html\html_document', 'desc' => 'Full HTML document wrapper'],
                ['name' => 'Head', 'file' => 'head.php', 'ns' => '\k1lib\html\head', 'desc' => 'Document head element'],
                ['name' => 'Body', 'file' => 'body.php', 'ns' => '\k1lib\html\body', 'desc' => 'Document body element'],
                ['name' => 'Title', 'file' => 'title.php', 'ns' => '\k1lib\html\title', 'desc' => 'Document title element'],
                ['name' => 'Meta', 'file' => 'meta.php', 'ns' => '\k1lib\html\meta', 'desc' => 'Meta tag element'],
                ['name' => 'Link', 'file' => 'link.php', 'ns' => '\k1lib\html\link', 'desc' => 'Link element'],
                ['name' => 'Script', 'file' => 'script.php', 'ns' => '\k1lib\html\script', 'desc' => 'Script element'],
                ['name' => 'Style', 'file' => 'style.php', 'ns' => '\k1lib\html\style', 'desc' => 'Style element'],
            ];

            foreach ($docComponents as $comp):
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="component-card d-flex flex-column">
                    <h5><i class="bi bi-file-earmark-code me-2"></i><?= $comp['name'] ?></h5>
                    <code class="path"><?= $comp['ns'] ?></code>
                    <p class="text-muted small mb-auto"><?= $comp['desc'] ?></p>
                    <a href="tags/<?= $comp['file'] ?>" class="btn btn-outline-primary btn-sm">
                        View Example <i class="bi bi-arrow-right ms-1"></i>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <footer class="mt-5 mb-3 text-center text-muted">
            <p class="small">k1.lib-html &copy; <?= date('Y') ?> &middot; Object-oriented HTML Tags generation</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>