function ChatNotifier(channel) {

  this.events = {
      message_sent: 'message_sent'
  };

  channel.bind(this.events.message_sent, function(data){ handleSentMessage(data); });

}

function handleSentMessage(data){

 console.log(data);

}