CREATE TABLE Activity (
    player_id INTEGER,
    device_id INTEGER,
    event_date TEXT,
    games_played INTEGER,
    PRIMARY KEY (player_id, event_date)
);
