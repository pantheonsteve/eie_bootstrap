<div class="curriculum-unit-detail <?php print $classes; ?>" id="node-<?php print $node->nid; ?>" <?php print $attributes; ?>>

    <?php
    /*  ==========================================================================
        Unit Intro
        ========================================================================== */ ?>

    <div class="unit-intro" id="nav-overview">
        <div class="unit-intro--header">
            <?php print render($content['field_subtitle']); ?>
            <h1><?php print render($title); ?></h1>
        </div>
        <div class="unit-intro--content">
            <div class="unit-intro--left">
                <div class="image">
                    <?php print render($content['field_curriculum_unit_image']); ?>
                </div>
                <div class="whats-included">
                    <h3>What's Included?</h3>
                    <?php print render($content['field_unit_included_materials']); ?>

                    <?php if(isset($content['field_unit_purchase_link'])): ?>
                        <a href="<?php print $content['field_unit_purchase_link']['#items'][0]['url']; ?>" class="btn btn-stylized">
                            <b><?php print t('Buy The Unit'); ?></b>
                        </a>
                    <?php endif; ?>
                    <?php if(isset($content['field_unit_free_link'])): ?>
                        <a href="<?php print $content['field_unit_free_link']['#items'][0]['url']; ?>" class="btn btn-stylized">
                            <b><?php print t('Download for Free'); ?></b>
                        </a>
                    <?php endif; ?>
                    <?php if(isset($content['field_unit_preview_link'])): ?>
                        <a href="<?php print $content['field_unit_preview_link']['#items'][0]['url']; ?>" class="btn btn-stylized">
                            <b><?php print t('Preview Unit'); ?></b>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="unit-intro--right">
                <div class="unit-at-glance">
                    <h3>Unit at a Glance</h3>
                    <div class="unit-terms">
                        <?php print render($content['field_science_category']); ?>
                        <?php print render($content['field_grade']); ?>
                        <?php print render($content['field_curriculum_unit_audience']); ?>
                    </div>
                    <div class="unit-field">
                        <?php print render($content['field_engineering']); ?>
                    </div>
                    <div class="unit-details">
                        <?php print render($content['field_additional_details']); ?>
                    </div>
                </div>
                <div class="unit-overview">
                    <h3>Unit Overview</h3>
                    <?php print render($content['body']); ?>
                </div>
            </div>
        </div>
    </div> <?php // </.unit-intro> ?>


    <div class="unit-contents">

        <?php
        /*  ==========================================================================
            Optional Teaching Supplies
            ========================================================================== */ ?>

        <?php if(!empty($content['field_unit_materials_content']) ||
            !empty($content['field_storybooks_content']) ): ?>

            <div class="unit-supplies">
            <h3>Optional Teaching Supplies</h2>
                <div>

                    <?php if(!empty($content['field_unit_materials_content'])): ?>
                        <div class="unit-materials">
                            <div class="materials-image">
                                <?php print render($content['field_materials_image']); ?>
                            </div>
                            <div class="materials-description">
                                <div class="materials-description--title">
                                    <h3>Materials for this Unit</h3>
                                </div>
                                <div class="materials-description--content">
                                    <?php print render($content['field_unit_materials_content']); ?>
                                </div>
                                <?php if(!empty($content['field_materials_link'])): ?>
                                    <div class="materials-description--link">
                                        <strong>Want to Purchase the Materials Kit?</strong>
                                        <?php print render($content['field_materials_link']); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if(!empty($content['field_materials_list'])): ?>
                                    <div class="materials-description--link">
                                        <strong>Want to create your own kit?</strong>
                                        <a href="<?php print file_create_url($content['field_materials_list']['#items'][0]['uri']); ?>">
                                            Download Unit Materials List &raquo;
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php if(!empty($content['field_storybooks_content'])): ?>
                        <div class="unit-storybook">
                            <div class="storybook-image">
                                <?php print render($content['field_storybooks_image']); ?>
                            </div>
                            <div class="storybook-description">
                                <div class="storybook-description--title">
                                    <h3>Additional Storybooks for Classroom Use</h3>
                                </div>
                                <div class="storybook-description--content">
                                    <?php print render($content['field_storybooks_content']); ?>
                                </div>
                                <div class="storybook-description--link">
                                    <?php print render($content['field_storybooks_link']); ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div><?php // </.unit-supplies> ?>

        <?php endif; ?>

        <?php
        /*  ==========================================================================
            Resources
            ========================================================================== */ ?>

        <div class="unit-resources">
            <h3><?php print t('Resources for this Unit'); ?></h3>

            <?php print render($content['field_unit_resources_body']); ?>
        </div>

        <?php
        /*  ==========================================================================
            Supporting Resources
            ========================================================================== */ ?>

        <?php if(!empty($content['field_preparatory_lesson']) ): ?>

            <div class="unit-resources">
                <h2><?php print t('Explore the Lessons'); ?></h2>
            </div>

            <div class="prepatory-lesson">
                <?php print render($content['field_preparatory_lesson']); ?>
            </div>

            <div class="unit-lessons">
                <?php print render($content['field_unit_lessons']); ?>
            </div>

        <?php endif; ?>


    </div> <?php // </.unit-contents> ?>

</div><?php // </.node> ?>
