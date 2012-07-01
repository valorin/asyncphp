<?php
/**
 * Asynchronous PHP Example
 *
 * Catch a Triggered flag and append a value into p#content
 */
require '../vendor/autoload.php';


/**
 * Load AsyncPhp manager
 */
$manager = AsyncPhp\Manager::getInstance();


/**
 * Configure Manager
 */
$manager->setJsDir('../js');


/**
 * Check for trigger
 */
if ($manager->getRequest()->isTriggered('append')) {
    /**
     * Create new Response
     */
    $response = $manager->newResponse();


    /**
     * Fetch value from Parameter
     */
    $value = $manager->getRequest()->getParam('value', "default override");


    /**
     * Append p#content content
     */
    $response->query("p#content")->call('append', "Math.random() = {$value}<br />");


    /**
     * Return response
     */
    $response->finish();
}

?>

<!-- Basic Example HTML -->
<div>
    <h1>Asynchronous PHP Example</h1>
    <h2>Catch a Triggered flag and append a value into div#content</h2>
    <p id='content'>Click the button to append text to this &lt;p&gt; element.</p>
    <button onClick="asyncPhp.trigger('append', {value: Math.random()});">Append Random number</button>
</div>

<!-- Include Scripts -->
<?= $manager->generateIncludes(); ?>
