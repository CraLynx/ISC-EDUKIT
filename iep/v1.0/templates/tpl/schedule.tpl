{include file='html/begin.tpl'}
  <div class="ui stackable internally celled grid">
    <div class="row">
      <div class="three wide column">
        {if $user != NULL}
          {include file='blocks/user_menu.tpl'}  
        {else}
          {include file='blocks/guest_menu.tpl'}
        {/if}
      </div>
      <div class="thirteen wide column">
        <div class="ui stackable grid">
          <div class="row">
            <div class="sixteen wide column">
              <div id="week" class="ui mini statistic">
                <div class="value">
                  {$week}
                </div>
                <div class="label">
                  Неделя
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="sixteen wide column">
              <div class="ui steps">
                <div class="ui red step button" id="1">
                  <div class="content">
                    <a class="ui red button">ПН</a>
                  </div>
                </div>
                <div class="ui orange step button" id="2">
                  <div class="content">
                    <a class="ui orange button">ВТ</a>
                  </div>
                </div>
                <div class="ui yellow step button" id="3">
                  <div class="content">
                    <a class="ui yellow button">СР</a>
                  </div>
                </div>
                <div class="ui green step button" id="4">
                  <div class="content">
                    <a class="ui green button">ЧТ</a>
                  </div>
                </div>
                <div class="ui teal step button" id="5">
                  <div class="content">
                    <a class="ui teal button">ПТ</a>
                  </div>
                </div>
                <div class="ui blue step button" id="6">
                  <div class="content">
                    <a class="ui blue button">СБ</a>
                  </div>
                </div>
                <div class="ui violet step button" id="7">
                  <div class="content">
                    <a class="ui violet button">ВС</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="ten wide column">
              <div class="ui stackable grid">
                <div class="row">
                  <div class="sixteen wide column">
                    <form name="selectGroupForm" method="POST" class="ui form">
                      <div class="field">
                        <div class="ui stackable grid">
                          <div class="eleven wide column">
                            <select name="group" class="ui fluid dropdown">
                              {foreach from=$groups item=group}
                                <option value="{$group->getGroupID()}">{$group->getNumberGroup()}</option>
                              {/foreach}
                            </select>
                          </div>
                          <div class="five wide column">
                            <input type="submit" name="selectGroupButton" value="Показать расписание" class="ui button">
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="row">
                  <div class="sixteen wide column">
                    {if $changed_schedules != NULL}
                      {foreach from=$changed_schedules key=grp item=schedule}
                      <div id="groupSchedule" class="ui styled accordion">
                          <div class="active title">
                            Изменения
                          </div>
                          <div class="active content">
                            {foreach from=$schedule key=day item=data}
                              <div class="accordion">
                                <div class="title">
                                  <h3>{$day|date_format:"d.m.Y"}</h3>
                                </div>
                                <div class="content">
                                  <table class="ui table bordered">
                                    <thead>
                                      <tr>
                                        <th><h4>Пара</h4></th>
                                        <th><h4>Предмет</h4></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      {foreach from=$data item=entry}
                                        <tr>
                                          <td>{$entry['pair']}</td>
                                          <td>{$entry['subject']}</td>
                                        </tr>
                                      {/foreach}
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            {/foreach}
                          </div>
                        </div>
                      {/foreach}
                    {/if}
                    <br>
                    {if $schedules != NULL}
                      {foreach from=$schedules key=grp item=schedule}
                        <div id="groupSchedule" class="ui styled accordion">
                          <div class="active title">
                            Основное расписание для {$grp}
                          </div>
                          <div class="active content">
                            {foreach from=$schedule key=day item=data}
                              <div class="accordion">
                                <div class="title">
                                  <h3>{$day}</h3>
                                </div>
                                <div class="content">
                                  <table class="ui table celled">
                                    <thead>
                                      <tr>
                                        <th><h4>Пара</h4></th>
                                        <th><h4>Нижняя неделя</h4></th>
                                        <th><h4>Верхняя неделя</h4></th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      {foreach from=$data item=entry}
                                        <tr>
                                          <td>{$entry['pair']}</td>
                                          {if $entry['subj_1'] == $entry['subj_2']}
                                            <td colspan="2">{$entry['subj_1']}</td>
                                          {else}
                                            <td>{$entry['subj_1']}</td>
                                            <td>{$entry['subj_2']}</td>
                                          {/if}
                                        </tr>
                                      {/foreach}
                                    </tbody>
                                  </table>
                                </div>
                              </div>
                            {/foreach}
                          </div>
                        </div>
                      {/foreach}
                    {/if}
                  </div>
                </div>
              </div>
            </div>
            <div class="six wide column">
              {include "blocks/schedule/calls.tpl"}
              {include "blocks/schedule/eats.tpl"}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  {if $user == NULL}
    {include file='modals/reg_student.tpl'}
    {include file='modals/auth.tpl'}
  {/if}

  <script type="text/javascript" src="js/getDay.js"></script>
  <script type="text/javascript">
    $('.ui.accordion').accordion();
  </script>
{include file='html/end.tpl'}