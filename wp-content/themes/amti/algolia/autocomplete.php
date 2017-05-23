<script type="text/html" id="tmpl-autocomplete-header">
  <div class="autocomplete-header">
    <div class="autocomplete-header-title">{{{ data.label }}}</div>
    <div class="clear"></div>
  </div>
</script>

<script type="text/html" id="tmpl-autocomplete-post-suggestion">
  <a class="suggestion-link" href="{{ data.permalink }}" title="{{ data.post_title }}">
    <# if ( data.images.thumbnail ) { #>
      <img class="suggestion-post-thumbnail" src="{{ data.images.thumbnail.url }}" alt="{{ data.post_title }}">
      <# } #>
        <div class="suggestion-post-attributes">
          <span class="suggestion-post-title">{{{ data._highlightResult.post_title.value }}}</span>
          <# if ( data._snippetResult['content'] ) { #>
            <span class="suggestion-post-content">{{{ data._snippetResult['content'].value }}}</span>
            <# } #>
        </div>
  </a>
</script>

<script type="text/html" id="tmpl-autocomplete-term-suggestion">
  <a class="suggestion-link" href="{{ data.permalink }}" title="{{ data.name }}">
    <svg viewBox="0 0 21 21" width="21" height="21">
      <svg width="21" height="21" viewBox="0 0 21 21">
        <path
            d="M4.662 8.72l-1.23 1.23c-.682.682-.68 1.792.004 2.477l5.135 5.135c.7.693 1.8.688 2.48.005l1.23-1.23 5.35-5.346c.31-.31.54-.92.51-1.36l-.32-4.29c-.09-1.09-1.05-2.06-2.15-2.14l-4.3-.33c-.43-.03-1.05.2-1.36.51l-.79.8-2.27 2.28-2.28 2.27zm9.826-.98c.69 0 1.25-.56 1.25-1.25s-.56-1.25-1.25-1.25-1.25.56-1.25 1.25.56 1.25 1.25 1.25z"
            fill-rule="evenodd"></path>
      </svg>
    </svg>
    <span class="suggestion-post-title">{{{ data._highlightResult.name.value }}}</span>
  </a>
</script>

<script type="text/html" id="tmpl-autocomplete-user-suggestion">
  <a class="suggestion-link user-suggestion-link" href="{{ data.posts_url }}" title="{{ data.display_name }}">
        <span class="suggestion-post-title">{{{ data._highlightResult.display_name.value }}}</span>
  </a>
</script>

<script type="text/html" id="tmpl-autocomplete-footer">
  <div class="autocomplete-footer">
    <div class="autocomplete-footer-branding">
      <a href="" class="seeMoreResults"><?php esc_html_e( 'See More Results', 'algolia' ); ?></a>
    </div>
  </div>
</script>

<script type="text/html" id="tmpl-autocomplete-empty">
  <div class="autocomplete-empty">
      <?php esc_html_e('No results matched your query ', 'algolia'); ?>
    <span class="empty-query">"{{ data.query }}"</span>
  </div>
</script>

<script type="text/javascript">
  jQuery(function () {
    /* init Algolia client */
    var client = algoliasearch(algolia.application_id, algolia.search_api_key);

    /* setup default sources */
    var sources = [];
    jQuery.each(algolia.autocomplete.sources, function (i, config) {
      var suggestion_template = wp.template(config['tmpl_suggestion']);
      sources.push({
        source: algoliaAutocomplete.sources.hits(client.initIndex(config['index_name']), {
          hitsPerPage: config['max_suggestions'],
          attributesToSnippet: [
            'content:10'
          ],
          highlightPreTag: '__ais-highlight__',
          highlightPostTag: '__/ais-highlight__'
        }),
        templates: {
          header: function () {
            return wp.template('autocomplete-header')({
              label: _.escape(config['label'])
            });
          },
          suggestion: function (hit) {
            for (var key in hit._highlightResult) {
              /* We do not deal with arrays. */
              if (typeof hit._highlightResult[key].value !== 'string') {
                continue;
              }
              hit._highlightResult[key].value = _.escape(hit._highlightResult[key].value);
              hit._highlightResult[key].value = hit._highlightResult[key].value.replace(/__ais-highlight__/g, '<em>').replace(/__\/ais-highlight__/g, '</em>');
            }

            for (var key in hit._snippetResult) {
              /* We do not deal with arrays. */
              if (typeof hit._snippetResult[key].value !== 'string') {
                continue;
              }

              hit._snippetResult[key].value = _.escape(hit._snippetResult[key].value);
              hit._snippetResult[key].value = hit._snippetResult[key].value.replace(/__ais-highlight__/g, '<em>').replace(/__\/ais-highlight__/g, '</em>');
            }

            return suggestion_template(hit);
          }
        }
      });

    });

    /* Setup dropdown menus */
    jQuery("input[name='s']:not('.no-autocomplete')").each(function (i) {
      var $searchInput = jQuery(this);

      var config = {
        debug: algolia.debug,
        hint: false,
        openOnFocus: true,
        appendTo: 'body',
        templates: {
          empty: wp.template('autocomplete-empty')
        }
      };

      config.templates.footer = wp.template('autocomplete-footer');

      /* Instantiate autocomplete.js */
      var autocomplete = algoliaAutocomplete($searchInput[0], config, sources)
      .on('autocomplete:selected', function (e, suggestion) {
        /* Redirect the user when we detect a suggestion selection. */
        window.location.href = suggestion.permalink;
      })
      .on('autocomplete:updated', function() {
        var searchTerm = $searchInput[0].value;
        jQuery(".seeMoreResults").attr("href", "/?s="+searchTerm);
      });

      /* Force the dropdown to be re-drawn on scroll to handle fixed containers. */
      jQuery(window).scroll(function() {
        if(autocomplete.autocomplete.getWrapper().style.display === "block") {
          autocomplete.autocomplete.close();
          autocomplete.autocomplete.open();
        }
      });
    });

    jQuery(document).on("click", ".algolia-powered-by-link", function (e) {
      e.preventDefault();
      window.location = "https://www.algolia.com/?utm_source=WordPress&utm_medium=extension&utm_content=" + window.location.hostname + "&utm_campaign=poweredby";
    });
  });
</script>