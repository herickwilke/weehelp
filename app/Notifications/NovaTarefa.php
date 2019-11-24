<?php

namespace App\Notifications;

use App\TimeEntry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\TimeWorkType;

class NovaTarefa extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(TimeEntry $timeEntry)
    {
        //
        $this->tarefa = $timeEntry;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $criador = auth()->user('name');
        return (new MailMessage)
        ->subject("Uma nova tarefa para você: {$this->tarefa->work_type->name}")
        ->line("Uma nova tarefa foi criada para você pelo usuário {$criador->name}.")
        ->action("Ver a tarefa", route('admin.time-entries.show', $this->tarefa->id))
        ->line('Foi criada uma nova tarefa no sistema de chamados WeeHelp para você. Para visualizar, clique no botão ver a tarefa acima.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        $teste = auth()->user()->name;
        return [
            'data' => "{$teste} criou a tarefa nº {$this->tarefa->id} atribuída a você."
        ];
    }
}
