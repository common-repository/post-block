(function ($) {
    'use strict';

    $(document).ready(function () {
        function injectTOC() {
            var windowWidth = $(window).width();
            if (windowWidth <= 768) {
                $('#frhd-fp-article-post-inner').after($('#frhd-fp-article-toc'));
            } 
        }
        injectTOC();

        // Call the function whenever the window is resized
        $(window).resize(function() {
            injectTOC();
        });

        var content = document.getElementById('frhd-fp-article-content-inner');
        var tocSticky = document.getElementById('toc-list');

        window.addEventListener('scroll', updateStickyState);

        function updateStickyState() {
            var scrollPosition = window.scrollY;
            var offset = content.offsetTop;

            if (scrollPosition >= offset) {
                tocSticky.style.position = 'sticky';
                tocSticky.style.top = '50px';
            } else {
                tocSticky.style.position = 'static';
            }
        }
        tocSticky.style.maxHeight = 'calc(100vh - 100px)';
        tocSticky.style.overflowY = 'auto';
        tocSticky.style.overflowX = 'hidden';
        tocSticky.style.paddingBottom="70px";
        tocSticky.style.scrollbarWidth = "thin";

        /**
         * Table Of Content.
         */
        var headers = $("#frhd-fp-article-get-content").find("h1, h2, h3, h4, h5, h6").filter(function() {
            return !$(this).closest('.ignore-toc').length;
        });

        var tocList = $("#frhd-fp-article-toc #toc-list");
        var numbering = [0, 0, 0, 0, 0, 0]; // Array to track numbering for each level

        // Check if any headers are found
        if (headers.length === 0) {
            $("#frhd-fp-article-toc").append("<p>No headings in article</p>");
        } else {
            headers.each(function(index) {
                var header = $(this);
                var headerText = header.text();
                var headerId = header.attr('id') || `toc-${index}`;
                var headerLevel = parseInt(header.prop('tagName').substring(1));

                // Ensure the header has an ID
                header.attr('id', headerId);

                // Reset numbering for lower levels
                for (var i = headerLevel + 1; i <= 6; i++) {
                    numbering[i - 1] = 0;
                }

                // Increment numbering for current level
                numbering[headerLevel - 1]++;

                // Build numbering string with right bracket
                var numberingStr = numbering.slice(0, headerLevel).join('.');
                numberingStr = numberingStr.replace(/^0\./, ''); // Remove first zero if exists
                numberingStr = numberingStr + ') ';

                // Create a list item and link for each header
                var listItem = $('<li>').addClass(`toc-${header.prop('tagName').toLowerCase()}`);
                var link = $('<a>').attr('href', `#${headerId}`).text(headerText);

                // Check if the body or any parent element has the class 'no-numbering' and remove numbering if it does
                if (!$('#frhd-fp-article-main').hasClass('toc-type-numeric')) {
                    numberingStr = '';
                }

                listItem.append(link.prepend(numberingStr)); // Prepend numbering to the link text
                tocList.append(listItem);

                // Smooth scroll to section
                link.click(function(e) {
                    e.preventDefault();
                    $('html, body').animate({
                        scrollTop: $(`#${headerId}`).offset().top
                    }, 1000);
                });
            });
        }
       // Function to highlight active section in TOC and scroll to it
    function highlightActive() {
        var scrollPosition = $(window).scrollTop();

        // Loop through each header to find the active one
        headers.each(function() {
            var currentHeader = $(this);
            var headerTop = currentHeader.offset().top;
            var headerBottom = headerTop + currentHeader.outerHeight();

            // Check if the header is in the viewport
            if (headerTop <= scrollPosition && headerBottom > scrollPosition) {
                var id = currentHeader.attr('id');
                $('li').removeClass('active');
                $('a[href="#' + id + '"]').parent().addClass('active');

                // Scroll the TOC container to make the active item visible
                var activeItemTop = $('a[href="#' + id + '"]').parent().position().top;
                $('#toc-list').scrollTop($('#toc-list').scrollTop() + activeItemTop);
            }
        });
    }
        // Bind to the scroll event
        $(window).scroll(highlightActive);

    });

})(jQuery);


//Top progress bar
document.addEventListener('DOMContentLoaded', function () {
    const topScrollbar = document.getElementById('frhd-fp-top-progress-bar');
    const topScrollbarThumb = document.getElementById('frhd-fp-progress-bar-thumb');
    const contentInnerSection = document.getElementById('frhd-fp-article-content-inner');

    const updateTopScrollbar = () => {
        const sectionTop = contentInnerSection.offsetTop;
        const scrollPosition = window.scrollY;

        // Calculate scroll percentage only when inside the contentInnerSection
        let scrollPercentage = 0;
        if (scrollPosition >= sectionTop) {
            const maxScroll = contentInnerSection.scrollHeight - window.innerHeight;
            scrollPercentage = Math.min((scrollPosition - sectionTop) / (maxScroll - sectionTop), 1) * 100;
        }

        topScrollbarThumb.style.width = `${scrollPercentage}%`;
    };

    window.addEventListener('scroll', updateTopScrollbar);

    let isScrolling;
    window.addEventListener('scroll', () => {
        clearTimeout(isScrolling);
        topScrollbar.style.display = 'block';
    });

    topScrollbar.addEventListener('click', () => {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    });
});

/* Copy To Clipboard */
function copyToClipboard() {
    alert("Link copied to clipboard!");
    const currentURL = window.location.href;

    const tempElement = document.createElement("textarea");
    tempElement.value = currentURL;

    document.body.appendChild(tempElement);

    tempElement.select();
    tempElement.setSelectionRange(0, 99999);
    document.execCommand("copy");

    document.body.removeChild(tempElement);

    const copyButton = document.querySelector(".copy");
    const linkIcon = document.getElementById("linkIcon");
    const checkIcon = document.getElementById("checkIcon");

    copyButton.textContent = "Copied!";
    linkIcon.style.display = "none";
    checkIcon.style.display = "block";

    setTimeout(() => {
        copyButton.textContent = "Copy link";
        linkIcon.style.display = "block";
        checkIcon.style.display = "none";
    }, 2000);
}