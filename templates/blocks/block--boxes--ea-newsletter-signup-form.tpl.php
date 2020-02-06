<?php

/**
 * @file
 * Default theme implementation to display a block.
 *
 * Available variables:
 * - $block->subject: Block title.
 * - $content: Block content.
 * - $block->module: Module that generated the block.
 * - $block->delta: An ID for the block, unique within each module.
 * - $block->region: The block region embedding the current block.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the
 *   following:
 *   - block: The current template type, i.e., "theming hook".
 *   - block-[module]: The module generating the block. For example, the user
 *     module is responsible for handling the default user navigation block. In
 *     that case the class would be 'block-user'.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Helper variables:
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $block_zebra: Outputs 'odd' and 'even' dependent on each block region.
 * - $zebra: Same output as $block_zebra but independent of any block region.
 * - $block_id: Counter dependent on each block region.
 * - $id: Same output as $block_id but independent of any block region.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 * - $block_html_id: A valid HTML ID and guaranteed unique.
 *
 * @see template_preprocess()
 * @see template_preprocess_block()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
<?php if ($block->subject): ?>
  <h3<?php print $title_attributes; ?>><?php print $block->subject ?></h3>
<?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>

  <h5 class="newsletter--ribbon"><?php print t('Afterschool Engineering Update'); ?></h5>

<div class="newsletter--embed">

  <form action="https://madmimi.com/signups/subscribe/82268"; method="post" id="mad_mimi_signup_form" target="_blank">
    <div class="required row">
      <div class="small-12 columns">
        <label for="signup_email">Email</label>
        <input id="signup_email" name="signup[email]" type="text" placeholder="" data-invalid-email="This field is invalid" data-required-field="This field is required" class="required">
      </div>
    </div>
    <div class="required row">
      <div class="small-12 columns"><label for="signup_first_name" id="wf_label">First Name</label>
        <input id="signup_first_name" name="signup[first_name]" type="text" data-required-field="This field is required" class="required">
      </div>
    </div>
    <div class="required row">
      <div class="small-12 columns"><label for="signup_last_name" id="wf_label">Last Name</label>
        <input id="signup_last_name" name="signup[last_name]" type="text"data-required-field="This field is required" class="required">
      </div>
    </div>
    <div class="row">
      <div class="small-12 columns">
        <input id="webform_submit_button" value="Sign Up" type="submit" class="submit btn" data-default-text="Sign Up" data-submitting-text="Sending..." data-invalid-text="required">
      </div>
    </div>
  </form>

  <script type="text/javascript">
(function() {
  var form = document.getElementById("mad_mimi_signup_form"),
      submit = document.getElementById("webform_submit_button"),
      validEmail = /.+@.+\..+/,
      isValid;

  form.onsubmit = function(event) {
    validate();
    if(!isValid) {
      revalidateOnChange();
      return false;
    }
  };

  function validate() {
    isValid = true;
    emailValidation();
    fieldsValidation();
    listsValidation();
    updateFormAfterValidation();
  }

  function emailValidation() {
    var email = document.getElementById("signup_email");
    if(!validEmail.test(email.value)) {
      errorMessage(email);
      isValid = false;
    } else {
      removeErrorMessage(email);
    }
  }

  function fieldsValidation() {
    for(var i = 0; i < form.elements.length; ++i) {
      var input = form.elements[i];
      if(input.id == "signup_email") continue;
      if(input.className.indexOf("required") >= 0) {
        if(input.value == "") {
          errorMessage(input)
          isValid = false;
        } else {
          removeErrorMessage(input);
        }
      }
    }
  }

  function listsValidation() {
    var mainListsDiv = document.getElementById("signup_audience_lists");
    if(mainListsDiv && mainListsDiv.className.indexOf("required") >= 0) {
      var listSelected = false;
      for(var i = 0; i < form.elements.length; ++i) {
        var input = form.elements[i];
        if(input.type != "checkbox") continue;
        if(input.checked) listSelected = true;
      }
      if(!listSelected) {
        if(mainListsDiv.className.indexOf("invalid") == -1) mainListsDiv.className += " invalid";
        isValid = false;
      } else {
        mainListsDiv.className = mainListsDiv.className.replace(/ invalid/g, "");
      }
    }
  }

  function errorMessage(input) {
    input.className   = "required invalid";
    input.placeholder = input.getAttribute("data-required-field");
  }

  function removeErrorMessage(input) {
    input.className   = "required";
    input.placeholder = "";
  }

  function updateFormAfterValidation() {
    form.className = isValid ? "" : "mimi_invalid";
    submit.value = submitButtonText();
    submit.disabled = !isValid;
    submit.className = isValid ? "submit" : "disabled";
  }

  function submitButtonText() {
    var text;
    if(isValid) {
      text = submit.getAttribute("data-default-text");
    } else {
      var allFieldsValid = checkIfAllFieldsAreValid();
      if(allFieldsValid) {
        text = submit.getAttribute("data-choose-list");
      } else {
        text = submit.getAttribute("data-invalid-text");
      }
    }
    return text;
  }

  function checkIfAllFieldsAreValid() {
    var allFieldsValid = true
    for(var i = 0; i < form.elements.length; ++i) {
      var input = form.elements[i];
      if(input.placeholder && input.placeholder.length > 0) allFieldsValid = false;
    }
    return allFieldsValid;
  }

  function revalidateOnChange() {
    for(var i = 0; i < form.elements.length; ++i) {
      var input = form.elements[i];
      if(input.className.indexOf("required") >= 0 || input.type == "checkbox") {
        input.onchange = validate;
      }
    }
  }
})();
  </script>
</div>

</div>
