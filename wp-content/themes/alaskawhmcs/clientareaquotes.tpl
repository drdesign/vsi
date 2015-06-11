{include file="$template/pageheader.tpl" title=$LANG.quotestitle desc=$LANG.quotesintro}

<table class="table table-striped ts-table-reswhmcs">
  <thead>
    <tr>
      <th{if $orderby eq "id"} class="headerSort{$sort}"{/if}><a href="clientarea.php?action=quotes&orderby=id">{$LANG.quotenumber}</a></th>
      <th{if $orderby eq "subject"} class="headerSort{$sort}"{/if}><a href="clientarea.php?action=quotes&orderby=subject">{$LANG.quotesubject}</a></th>
      <th{if $orderby eq "datecreated"} class="headerSort{$sort}"{/if}><a href="clientarea.php?action=quotes&orderby=datecreated">{$LANG.quotedatecreated}</a></th>
      <th{if $orderby eq "validuntil"} class="headerSort{$sort}"{/if}><a href="clientarea.php?action=quotes&orderby=validuntil">{$LANG.quotevaliduntil}</a></th>
      <th{if $orderby eq "stage"} class="headerSort{$sort}"{/if}><a href="clientarea.php?action=quotes&orderby=stage">{$LANG.quotestage}</a></th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>
    {foreach from=$quotes item=quote}
    <tr>
      <td data-title="{$LANG.quotenumber}"><a href="dl.php?type=q&id={$quote.id}" target="_blank">{$quote.id}</a></td>
      <td data-title="{$LANG.quotesubject}">{$quote.subject}</td>
      <td data-title="{$LANG.quotedatecreated}">{$quote.datecreated}</td>
      <td data-title="{$LANG.quotevaliduntil}">{$quote.validuntil}</td>
      <td data-title="{$LANG.quotestage}">{$quote.stage}</td>
      <td class="ts-footer-tb"><input type="button" class="btn btn-info" value="{$LANG.quoteview}" onclick="window.location='viewquote.php?id={$quote.id}'" />&nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-info" value="{$LANG.quotedownload}" onclick="window.location='dl.php?type=q&id={$quote.id}'" /></td>
    </tr>
    {foreachelse}
    <tr>
      <td colspan="6" class="ts-no-title">{$LANG.norecordsfound}</td>
    </tr>
    {/foreach}
  </tbody>
  <tfoot>
    <tr>
      <td colspan="3" class="ts-footer-tb">{$numitems} {$LANG.recordsfound}, {$LANG.page} {$pagenumber} {$LANG.pageof} {$totalpages}</td>
      <td colspan="3" class="ts-footer-tb text-right">{include file="$template/clientarearecordslimit.tpl" clientareaaction=$clientareaaction}</td>
    </tr>
  </tfoot>
</table>


<ul class="pagination pull-right">
  <li class="prev{if !$prevpage} disabled{/if}"><a href="{if $prevpage}clientarea.php?action=quotes&amp;page={$prevpage}{else}javascript:return false;{/if}">&larr; {$LANG.previouspage}</a></li>
  <li class="next{if !$nextpage} disabled{/if}"><a href="{if $nextpage}clientarea.php?action=quotes&amp;page={$nextpage}{else}javascript:return false;{/if}">{$LANG.nextpage} &rarr;</a></li>
</ul>