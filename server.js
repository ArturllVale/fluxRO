const express = require('express');
const { exec } = require('child_process');
const app = express();
app.use(express.json());

app.post('/webhook', (req, res) => {
    exec('cd /www/wwwroot/fluxcp && git pull', (error, stdout, stderr) => {
        if (error) {
            console.error(`exec error: ${error}`);
            return;
        }
        console.log(`stdout: ${stdout}`);
        console.error(`stderr: ${stderr}`);
    });
    res.json({ received: true });
});

app.listen(3000, () => console.log('Server running on port 3000'));
