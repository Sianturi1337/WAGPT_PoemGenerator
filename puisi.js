const request = require("request");

const OPENAI_APIKEY = "";
const nama_mu = "";
const prompt = "Buatlah sebuah puisi romantis untuk [nama_pasangan]";
const max_tokens = 1024;
const temperature = 0.5;
const FONNTE_API = "";
const TARGET_PHONE_NUMBER = "";

const options = {
  url: "https://api.openai.com/v1/completions",
  method: "POST",
  headers: {
    "Content-Type": "application/json",
    "Authorization": `Bearer ${OPENAI_APIKEY}`
  },
  json: {
    model: "text-davinci-002",
    prompt: prompt,
    max_tokens: max_tokens,
    temperature: temperature
  }
};

request(options, (error, response, body) => {
  if (error) {
    console.log("Failed to generate text");
    return;
  }

  const generated_text = body.choices[0].text.trim();

  const current_date = new Date().toLocaleString("id-ID", {
    timeZone: "Asia/Jakarta",
    day: "2-digit",
    month: "long",
    year: "numeric",
    hour: "2-digit",
    minute: "2-digit",
    timeZoneName: "short"
  });

  const final_text = `${generated_text}\n\nSalam Sayang dari ${nama_mu} - ${current_date}`;

  console.log(final_text);

  const sendOptions = {
    url: "https://api.fonnte.com/send",
    method: "POST",
    headers: {
      "Authorization": FONNTE_API
    },
    form: {
      target: TARGET_PHONE_NUMBER,
      message: final_text
    }
  };

  request(sendOptions, (sendError, sendResponse, sendBody) => {
    if (sendError) {
      console.log(sendError);
      return;
    }

    console.log(sendBody);
  });
});
