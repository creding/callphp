<h1>Call PHP</h1>

<h2>A plugin for ExpressionEngine which allows you to use PHP in your templates without enabling php.</h2>

<p>PHP functions are selected using the method param</p>

<blockquote>
  <p>method="str_replace"</p>
</blockquote>

<p>You can add parameters to the function call by separating the params with a | 
you can optionally wrap the params in square braces [] if you want to preserve 
a space at the beginning of the string.</p>

<blockquote>
  <p>params="[param1|param2|param3]"</p>
</blockquote>

<p>To replace all spaces in a string using str_replace use this. We are passing three params here
the first is a space, the second is an empty string, the third is the string to search.</p>

<blockquote>
  <p>{exp:callphp method="str_replace" params="[ ||The quick brown fox jumped over the lazy dog" }</p>
</blockquote>

<p>You can get the date like the</p>

<blockquote>
  <p>{exp:callphp method="date" params="m-d-Y"}</p>
</blockquote>

<p>call strtotime</p>

<blockquote>
  <p>{exp:callphp method="strtotime" params="Monday January 1, 2011"}</p>
</blockquote>

<p>You can also use the tag data as a param. When you use tag data it adds it as a param 
to the end of the array, therefore if you wanted to just use the tagdata you wouldn't 
declare the params in the tag.</p>

<blockquote>
  <p>{exp:callphp method="strtotime"}</p>
  
  <blockquote>
    <p>Monday January 1, 2011
    {/exp:callphp}</p>
  </blockquote>
</blockquote>
